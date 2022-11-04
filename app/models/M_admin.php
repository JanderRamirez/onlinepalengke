<?php
class M_admin extends Model
{

   // GET ALL CATEGORY RECORD
   public function categoryData()
   {
      $this->call->database();

      // $data['all_main'] = $this->db->table('tbl_category')->get_all();
      // $data['grouped_main'] = $this->db->table('tbl_category as t1')->left_join('tbl_sub_cat as t2', 't1.cat_id = t2.cat_id')->where_not_null('t2.cat_id')->group_by('t1.cat_id')->order_by('t1.category')->get_all();
      // $data['sub'] = $this->db->table('tbl_category as t1')->left_join('tbl_sub_cat as t2', 't1.cat_id = t2.cat_id')->where_not_null('t2.cat_id')->order_by('t1.category')->get_all();
      // $data['main'] = $this->db->table('tbl_category as t1')->select('t1.cat_id,t1.category')->left_join('tbl_sub_cat as t2', 't1.cat_id = t2.cat_id')->where_null('t2.cat_id')->get_all();
      $data = $this->db->raw('SELECT c.*, sc.sub_category, sc.sub_id, sc.sub_category AS sub_category FROM tbl_category AS c LEFT JOIN tbl_sub_cat as sc ON c.cat_id = sc.cat_id ORDER BY c.category, sc.sub_category');
      return $data;
   }

   // GET ALL UNIT RECORD
   public function unitData()
   {
      $this->call->database();
      return  $this->db->table('tbl_unit')->get_all();
   }

   // INSERT RECORD TO TBL PRODUCT
   public function addProduct($name, $description, $category, $unit, $price)
   {
      $currentDate = date_default_timezone_set('Asia/Singapore');
      $currentDate = date('Y-m-d H:i:s');
      if (str_contains($category, '-')) {
         $data = array(
            'prod_name'         => $name,
            'prod_description'  => $description,
            'cat_id'            => substr($category, 0, strpos($category, '-')),
            'sub_id'            => substr($category, strpos($category, '-') + 1),
            'prod_unit'         => $unit,
            'date_modified'     => $currentDate,
            'prod_price'        => $price
         );
      } else {
         $data = array(
            'prod_name'         => $name,
            'prod_description'  => $description,
            'cat_id'            => $category,
            'prod_unit'              => $unit,
            'date_modified'     => $currentDate,
            'prod_price'        => $price
         );
      }
      $this->db->table('tbl_product')->insert($data);
   }

   // GET LATEST PRODUCT RECORD
   public function latestProduct()
   {
      $this->call->database();
      $data = $this->db->table('tbl_product')->select_max('prod_id')->get();
      return $data;
   }

   // UPDATE PRODUCT LINK
   public function updateProductLink($id, $link)
   {
      $this->call->database();
      $data = [
         'image_link' => $link
      ];
      $this->db->table('tbl_product')->where('prod_id', $id)->update($data);
      return $data;
   }

   // UPDATE PRODUCT
   public function updateProduct($id, $name, $category, $unit, $price, $description)
   {
      $this->call->database();



      if (str_contains($category, '-')) {
         $data = [
            'cat_id'            => substr($category, 0, strpos($category, '-')),
            'prod_name'         => $name,
            'sub_id'            => substr($category, strpos($category, '-') + 1),
            'prod_description'  => $description,
            'prod_unit'         => $unit,
            'prod_price'        => $price
         ];
      } else {
         $data = array(
            'cat_id'            => $category,
            'prod_name'         => $name,
            'prod_description'  => $description,
            'prod_unit'         => $unit,
            'prod_price'        => $price
         );
      }






      $this->db->table('tbl_product')->where('prod_id', $id)->update($data);
   }

   // UPDATE TO ARCHIVE/UNARCHIVE
   public function isArchive($id, $isArchive)
   {
      if ($isArchive == 0)
         $isArchive = 1;
      else
         $isArchive = 0;

      $this->call->database();
      $data = [
         'archive' => $isArchive
      ];
      $this->db->table('tbl_product')->where('prod_id', $id)->update($data);
   }










   // GET ALL PRODUCT RECORDS
   public function productData($page, $records_per_page = 10, $search = "")
   {
      if ($records_per_page == "All")
         $records_per_page = '1000000000';
      $offset = ($page - 1) * $records_per_page;
      $data['products'] = $this->db
         ->table('tbl_product')
         ->limit($offset, $records_per_page)
         ->like('prod_name', "%" . $search . "%")
         ->order_by('prod_name')
         ->get_all();
      $count = $this->db
         ->table('tbl_product')
         ->like('prod_name', "%" . $search . "%")
         ->select_count('prod_id', 'count')
         ->order_by('prod_name')
         ->get_all()[0];
      $data['pagination'] = $this->paginator($count['count'], $records_per_page, $page);
      return $data;
   }





   // INITIALIZE PAGINATION
   public function paginator($total, $records_per_page, $page)
   {
      $this->call->library('pagination');
      $this->pagination->initialize($total, $records_per_page, $page, 'Admin/Product');
      return $this->pagination->paginate();
   }




   //  GET ALL SHOP INFO
   public function get_shop()
   {
      return $customer = $this->db->table('tbl_shop s')->left_join('tbl_owner as o', 's.owner_id=o.owner_id')->get_all();
   }
   //  GET ALL OWNER INFO
   public function get_owner()
   {
      return $customer = $this->db->table('tbl_owner')->order_by('owner_lname', 'ASC')->get_all();
   }
   //   UPDATE SHOP
   public function Update_stall($id, $name, $desc)
   {
      $data = [
         'shop_name' => $name,
         'shop_description' => $desc
      ];
      $this->db->table('tbl_shop')->where('shop_id', $id)->update($data);
   }

   //  UPDATE OWNER
   public function Update_owner($id, $num, $email)
   {
      $data = [
         'owner_cnum' => $num,
         'owner_email' => $email
      ];
      $this->db->table('tbl_owner')->where('owner_id', $id)->update($data);
   }

   //  ADD NEW SHOP
   public function Add_stall($name, $desc, $owner)
   {
      $bind = array(
         'shop_name' => $name,
         'shop_description' => $desc,
         'owner_id' => $owner
      );
      $this->db->table('tbl_shop')->insert($bind);
   }

   //  ADD NEW OWNER
   public function Add_owner($fname, $mname, $lname, $num, $email)
   {
      $bind = array(
         'owner_fname' => $fname,
         'owner_mname' => $mname,
         'owner_lname' => $lname,
         'owner_cnum' => $num,
         'owner_email' => $email
      );
      $this->db->table('tbl_owner')->insert($bind);
   }

   //  GET IMAGE LINK OF SHOP
   public function get_img()
   {
      return $this->db->table('tbl_shop s')->select('img_link')->get();
   }

   //  GET ID LAST INSERT SHOP
   public function lastShop()
   {
      return $this->db->table('tbl_shop')->select('shop_id')->order_by('shop_id', 'DESC')->get();
   }

   // UPDATE IMAGE LINK OF SHOP
   public function updateShopLink($id, $link)
   {
      $this->call->database();
      $data = [
         'image_link' => $link
      ];
      $this->db->table('tbl_shop')->where('shop_id', $id)->update($data);
      return $data;
   }

   // GET ALL PRODUCTS FOR PRICE UPDATE
   public function getProducts()
   {
      return $this->db->table('tbl_product')->order_by('prod_name', 'ASC')->where('archive', 0)->get_all();
   }

   // GET SUB CAT
   public function getCat()
   {
      return $this->db->table('tbl_category')->order_by('category', 'ACS')->get_all();
   }

   // GET CAT
   public function getSubCat()
   {
      return $this->db->table('tbl_sub_cat')->order_by('sub_category', 'ACS')->get_all();
   }

   // Update Single Product Price 
   // IF PRICE IS = '' THEN IT WILL UPDATE ONLY SHOP_ID IN THE ROW
   public function updateSingleProduct($productId, $shopID, $price = '')
   {
      if ($price == '') {
         $this->db->table('tbl_product')->where('prod_id', $productId)->update(
            array(
               'shop_id' => $shopID
            )
         );
      } else {
         $currentDate = date_default_timezone_set('Asia/Singapore');
         $currentDate = date('Y-m-d H:i:s');

         $earlyPrice = $this->db->table('tbl_product')->where(['prod_id' => $productId])->get();

         $bind = array(
            'prod_id' => $productId,
            "price" => $earlyPrice['prod_price'],
            'date_modified' => $earlyPrice['date_modified']
         );
         $this->db->table('tbl_price')->insert($bind);

         $this->db->table('tbl_product')->where('prod_id', $productId)->update(array(
            'prod_price' => $price,
            'date_modified' => $currentDate,
            'shop_id' => $shopID
         ));
      }
   }

   // GET ALL MARKETER
   public function Marketer()
   {
      return $this->db->table('tbl_admin')->where('admin_type', 2)->get_all();
   }

   // GET LATEST MARKETER RECORD
   public function lastMarketer()
   {
      $this->call->database();
      $data = $this->db->raw('SELECT max(admin_id) FROM tbl_admin WHERE admin_type = 2');
      return $data;
   }

   //ADD NEW MARKETER RECORD
   public function Add_Marketer($email, $username, $password, $fname, $mname, $lname, $num)
   {
      $bind = array(
         'admin_fname' => $fname,
         'admin_mname' => $mname,
         'admin_lname' => $lname,
         'admin_cnum' => $num,
         'admin_email' => $email,
         'admin_username' => $username,
         'admin_type' => 2,
         'admin_password' => password_hash($password, PASSWORD_DEFAULT)
      );
      $this->db->table('tbl_admin')->insert($bind);
   }

   // UPDATE MARKETER
   public function updateMarketer($id, $fn, $mn, $ln, $contact, $email, $username)
   {
      $this->call->database();
      $contact = str_replace('-', '', $contact);
      $data = [
         'admin_fname' => $fn,
         'admin_mname' => $mn,
         'admin_lname' => $ln,
         'admin_cnum' => $contact,
         'admin_email' => $email,
         'admin_username' => $username
      ];
      $this->db->table('tbl_admin')->where('admin_id', $id)->update($data);
   }

   // GET SINGLE SHOP
   public function getSingleShop($id)
   {
      $data = $this->db->table('tbl_shop')->where(['shop_id' => $id])->get();
      return $data;
   }

   // GET SINGLE OWNER
   public function getSingleOwner($id)
   {
      $data = $this->db->table('tbl_owner')->where(['owner_id' => $id])->get();
      return $data;
   }

   // INSERT NEW PRODUCT TO SHOP
   public function updateShopProducts($products, $shopId)
   {
      $this->db->table('tbl_shop_prod')->where("shop_id", $shopId)->delete();
      if (count($products) > 0) {
         foreach ($products as $product) {
            $data = [
               'shop_id' => $shopId,
               'prod_id' => $product
            ];
            $this->db->table('tbl_shop_prod')->insert($data);
            if ($this->db->raw('select IF(shop_id IS NULL, "0", shop_id) AS shop_id from tbl_product where prod_id = ?', array($product))[0]['shop_id'] == 0) {
               $this->updateSingleProduct($product, $shopId);
            }
         }
      }
   }

   // GET SHOP PRODUCTS
   public function getShopProducts($shopId)
   {
      $data = $this->db->table('tbl_shop_prod')->select('prod_id')->where('shop_id', $shopId)->get_all();
      if (count($data) > 0)
         return $data;
      else
         return array();
   }









   // SELECTS ALL DATA FROM TBL DELIVERY FEE
   public function getDeliveryFee()
   {
      $qry = 'SELECT * FROM tbl_barangay ORDER BY brgy_name ASC';
      return $this->db->raw($qry);
   }

   // ADD ROW TO DELIVERY FEE
   public function add_delivery_fee($price)
   {
      $currentDate = date_default_timezone_set('Asia/Singapore');
      $currentDate = date('Y-m-d H:i:s');
      $data = array(
         'delivery_fee'         => $price
      );
      $this->db->table('tbl_barangay')->insert($data);
   }

   // UPDATE DELIVERY FEE
   public function update_delivery_fee($id, $price)
   {
      $data = [
         'delivery_fee' => $price
      ];
      $this->db->raw("INSERT INTO tbl_delivery_fee_history (barangay_id, delivery_fee) VALUES (?, (SELECT delivery_fee FROM tbl_barangay WHERE brgy_id = ?))", array($id, $id));
      $this->db->table('tbl_barangay')->where('brgy_id', $id)->update($data);
   }

   // SELECTS ALL DATA FROM UNIT MEASUREMENTS
   public function getUnitMeasurement()
   {
      $qry = 'SELECT * FROM tbl_unit ORDER BY unit ASC';
      return $this->db->raw($qry);
   }

   // ADD UNIT OF MEASURE
   public function add_unit_of_measure($unit)
   {
      $ifexists = $this->db->table('tbl_unit')->select('unit')->where('unit', $unit)->get_all();
      if (count($ifexists) > 0) {
         $ifexists = 'may laman';
      } else {
         $data = array(
            'unit'         => $unit
         );
         $this->db->table('tbl_unit')->insert($data);
         $ifexists = '';
      }
      return $ifexists;
   }

   // UPDATE UNIT OF MEASURE
   public function update_unit_of_measure($id, $unit)
   {
      $ifexists = $this->db->table('tbl_unit')->select('unit')->where('unit', $unit)->get_all();
      if (count($ifexists) > 0) {
         $ifexists = 'may laman';
      } else {
         $data = [
            'unit' => $unit
         ];
         $this->db->table('tbl_unit')->where('unit_id', $id)->update($data);
         $ifexists = '';
      }
      return $ifexists;
   }

   // GET CATEGORY FOR CATEGORY PAGE AT MISCELLANEOUS PAGE
   public function get_category($select)
   {
      $mainCategories = $this->db->raw("SELECT * FROM tbl_category");

      $qry = '';
      foreach ($mainCategories as $category) {
         if ($select == strtolower($category['category'])) {
            $qry = 'SELECT c.category, sc.sub_category, c.cat_id, sc.sub_id FROM tbl_category as c LEFT JOIN tbl_sub_cat AS sc ON c.cat_id = sc.cat_id WHERE c.cat_id = ? ORDER BY c.category';
            return $this->db->raw($qry, [$category['cat_id']]);
            break;
         }
      }
      if ($qry == '') {
         $qry = 'SELECT c.category, sc.sub_category, c.cat_id, sc.sub_id FROM tbl_category as c LEFT JOIN tbl_sub_cat AS sc ON c.cat_id = sc.cat_id ORDER BY c.category';
         return $this->db->raw($qry);
      }
   }

   //  GET ALL MAIN CATEOGRIES ONLY
   public function getMainCategories()
   {
      return $this->db->table('tbl_category')->order_by('category', 'ASC')->get_all();
   }

   // ADD MAIN CATEGORY
   public function addMainCategory($category)
   {
      $ifexists = $this->db->table('tbl_category')->select('category')->where('category', strtolower($category))->get_all();
      if (count($ifexists) > 0) {
         $ifexists = 'may laman';
      } else {
         $data = array(
            'category'         => $category
         );
         $this->db->table('tbl_category')->insert($data);
         $ifexists = '';
      }
      return $ifexists;
   }

   // ADD SUB CATEGORY
   public function addSubCategory($mainCategory, $subCategory)
   {
      $mainCategoryID = $this->db->table('tbl_category')->select('cat_id')->where('category', strtolower($mainCategory))->get()['cat_id'];
      $ifexists = $this->db->table('tbl_category')->select('category')->where('category', strtolower($subCategory))->get_all();
      if (count($ifexists) > 0) {
         $ifexists = 'may laman';
      } else {
         $data = array(
            'cat_id' => $mainCategoryID,
            'sub_category'         => $subCategory
         );
         $this->db->table('tbl_sub_cat')->insert($data);
         $ifexists = '';
      }
      return $ifexists;
   }

   // UPDATE MAIN CATEGORY
   public function updateMainCategory($oldCategory, $newCategory)
   {
      $ifexists = $this->db->table('tbl_category')->select('category')->where('category', strtolower($newCategory))->get_all();
      if (count($ifexists) > 0) {
         $ifexists = 'may laman';
      } else {
         $this->db->raw('UPDATE tbl_category SET category = ? WHERE category = ?', [$newCategory, $oldCategory]);
         redirect(substr($_SERVER['PATH_INFO'], 0, strrpos($_SERVER['PATH_INFO'], '/')) . '/' . $newCategory);
      }
      return $ifexists;
   }

   // UPDATE SUB CATEGORY
   public function updateSubCategory($mainCategoryID, $oldSubCategory, $newSubCategory)
   {
      $qry = 'SELECT sc.sub_category FROM tbl_category as c INNER JOIN tbl_sub_cat as sc ON c.cat_id = sc.cat_id WHERE c.cat_id = ? AND sc.sub_category = ?';
      $ifexists = $this->db->raw($qry, [$mainCategoryID, $newSubCategory]);
      if (count($ifexists) > 0) {
         return 'may laman';
      } else {
         $qry = 'UPDATE tbl_sub_cat, tbl_category AS c INNER JOIN tbl_sub_cat AS sc ON sc.cat_id = c.cat_id SET sc.sub_category = ? WHERE sc.sub_category = ?';
         $this->db->raw($qry, [$newSubCategory, $oldSubCategory]);
      }
   }

   // GET ALL BARANGAY TBL ROWS
   public function getBarangay()
   {
      return $this->db->raw('SELECT * FROM tbl_barangay ORDER BY brgy_name');
   }

   // ADD BARANGAY
   public function addBarangay($barangay)
   {
      $ifexists = $this->db->table('tbl_barangay')->select('brgy_name')->where('brgy_name', strtolower($barangay))->get_all();
      if (count($ifexists) > 0) {
         return 'may laman';
      } else {
         $data = array(
            'brgy_name'         => $barangay
         );
         $this->db->table('tbl_barangay')->insert($data);
         return '';
      }
   }

   // UPDATE BARANGAY
   public function updateBarangay($oldBarangay, $newBarangay)
   {
      $ifexists = $this->db->table('tbl_barangay')->select('brgy_name')->where('brgy_name', strtolower($newBarangay))->get_all();
      if (count($ifexists) > 0) {
         $ifexists = 'may laman';
      } else {
         $this->db->raw('UPDATE tbl_barangay SET brgy_name = ? WHERE brgy_name = ?', [$newBarangay, $oldBarangay]);
         redirect($_SERVER['PATH_INFO']);
      }
      return $ifexists;
   }

   // GET ALL COURIER
   public function courier()
   {
      return $this->db->table('tbl_admin')->where('admin_type', 3)->get_all();
   }

   //ADD NEW COURIER RECORD
   public function add_courier($email, $username, $password, $fname, $mname, $lname, $num)
   {
      $bind = array(
         'admin_fname' => $fname,
         'admin_mname' => $mname,
         'admin_lname' => $lname,
         'admin_cnum' => $num,
         'admin_email' => $email,
         'admin_username' => $username,
         'admin_type' => 3,
         'admin_password' => password_hash($password, PASSWORD_DEFAULT)
      );
      $this->db->table('tbl_admin')->insert($bind);
   }

   // GET LATEST MARKETER RECORD
   public function lastCourier()
   {
      $this->call->database();
      $data = $this->db->table('tbl_admin')->select_max('admin_id')->where('admin_type', 3)->get();
      return $data;
   }

   // UPDATE COURIER
   public function updateCourier($id, $fn, $mn, $ln, $contact, $email, $username)
   {
      $this->call->database();
      $contact = str_replace('-', '', $contact);
      $data = [
         'admin_fname' => $fn,
         'admin_mname' => $mn,
         'admin_lname' => $ln,
         'admin_cnum' => $contact,
         'admin_email' => $email,
         'admin_username' => $username
      ];
      $this->db->table('tbl_admin')->where('admin_id', $id)->update($data);
   }
























   public function pending()
   {
      $this->call->database();
      return $this->db->table('tbl_transaction as t')->select('t.*,cu.*')->select_sum('(c.quantity*p.prod_price)', 'total')->left_join('tbl_cart as c', 't.trans_id=c.trans_id')->left_join('tbl_customer as cu', 't.cust_id=cu.cust_id')->left_join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('t.trans_id')->where(array('t.trans_status' => 'P'))->get_all();
   }

   public function onprocess()
   {
      $this->call->database();
      return $this->db->table('tbl_transaction as t')->select('t.*,cu.*')->select_sum('(c.quantity*p.prod_price)', 'total')->left_join('tbl_cart as c', 't.trans_id=c.trans_id')->left_join('tbl_customer as cu', 't.cust_id=cu.cust_id')->left_join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('t.trans_id')->where(array('t.trans_status' => 'OP'))->get_all();
   }

   public function ondelivery()
   {
      $this->call->database();
      return $this->db->table('tbl_transaction as t')->select('t.*,cu.*')->select_sum('(c.quantity*p.prod_price)', 'total')->left_join('tbl_cart as c', 't.trans_id=c.trans_id')->left_join('tbl_customer as cu', 't.cust_id=cu.cust_id')->left_join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('t.trans_id')->where(array('t.trans_status' => 'O'))->get_all();
   }

   public function finished()
   {
      $this->call->database();
      return $this->db->table('tbl_transaction as t')->select('t.*,cu.*')->select_sum('(c.quantity*p.prod_price)', 'total')->left_join('tbl_cart as c', 't.trans_id=c.trans_id')->left_join('tbl_customer as cu', 't.cust_id=cu.cust_id')->left_join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('t.trans_id')->where(array('t.trans_status' => 'D'))->get_all();
   }



   public function average_star()
   {
      return $this->db->table('tbl_transaction')->select_avg('rating', 'rating')->where('rating', '>', 0)->get();
   }
   public function star()
   {
      $data['one'] = $this->db->table('tbl_transaction')->select_count('rating', 'rating')->where('rating', 1)->get();
      $data['two'] = $this->db->table('tbl_transaction')->select_count('rating', 'rating')->where('rating', 2)->get();
      $data['three'] = $this->db->table('tbl_transaction')->select_count('rating', 'rating')->where('rating', 3)->get();
      $data['four'] = $this->db->table('tbl_transaction')->select_count('rating', 'rating')->where('rating', 4)->get();
      $data['five'] = $this->db->table('tbl_transaction')->select_count('rating', 'rating')->where('rating', 5)->get();
      return $data;
   }

   public function reg_user(){
      return $this->db->table('tbl_customer')->select_count('cust_id', 'total')->get();
  }
  public function earnings(){
      return $this->db->raw("SELECT ROUND(SUM(c.quantity*c.price),2) AS total FROM tbl_cart as c LEFT JOIN tbl_transaction as t ON c.trans_id = t.trans_id WHERE MONTH(t.trans_date)=MONTH(now()) AND YEAR(t.trans_date)=YEAR(now()) AND t.trans_status = 'D'");
  }

   public function notif_transaction()
   {
      $trans['pending'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where('trans_status', 'P')->get();
      $trans['process'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where('trans_status', 'OP')->get();
      $trans['delivery'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where('trans_status', 'O')->get();
      $trans['successful'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where('trans_status', 'D')->get();
      return $trans;
   }

   public function get_inflation_data($id = 0, $selectedDate = '')
   {
      if ($id == 0)
         $res = $this->db->raw('SELECT prod_id FROM tbl_product ORDER BY prod_name ASC LIMIT 1');
         if($res)
            $id = $res[0]['prod_id'];
      if (strlen($selectedDate) == 0)
         $selectedDate = date('Y-m');

      $inflation_data['inflation'] = $this->db->raw("SELECT MAX(date_modified) AS date_modified, (SELECT price FROM tbl_price as inner_p WHERE inner_p.date_modified = MAX(outer_p.date_modified) ORDER BY inner_p.id LIMIT 1) AS price FROM tbl_price as outer_p WHERE prod_id = ? AND date_modified LIKE concat(?,'%') GROUP BY DATE(date_modified) ORDER BY date_modified ASC", array($id, strval($selectedDate)));
      $prod = $this->db->raw('SELECT prod_name FROM tbl_product WHERE prod_id = ?', array($id));
      if($prod)
         $inflation_data['product'] = $prod[0]['prod_name'];

      // CONVERTING VALUES AS ARRAY OF STRING FOR CHART DATA/VALUES
      $length = count($inflation_data['inflation']);
      $inflation_data['percentage'] = '';
      $inflation_data['date'] = '';

      for ($i = 0; $i < $length; $i++) {

         if ($i == 0) {
            $percentage = 0;
         } else
            $percentage = number_format(((floatval($inflation_data['inflation'][$i]['price']) - floatval($inflation_data['inflation'][$i - 1]['price'])) / floatval($inflation_data['inflation'][$i - 1]['price'])) * 100);

         $date = '"' . date('F d', strtotime($inflation_data['inflation'][$i]['date_modified'])) . '"';


         if (count($inflation_data['inflation']) - 1 == $i) {
            $inflation_data['percentage'] .= $percentage;
            $inflation_data['date'] .=  $date;
         } else {
            $inflation_data['percentage'] .= $percentage . ',';
            $inflation_data['date'] .= $date . ',';
         }
      }
      $inflation_data['percentage'] = substr($inflation_data['percentage'], 0, strlen($inflation_data['percentage']));
      $inflation_data['date'] = substr($inflation_data['date'], 0, strlen($inflation_data['date']));
      return $inflation_data;
   }

   public function get_transactions($selectedDate = '')
   {
      if (strlen($selectedDate) == 0)
         $selectedDate = date('Y');
      $data['completed'] = $this->db->raw("SELECT COUNT(t.trans_id) AS 'completed', t.trans_date FROM tbl_transaction AS t WHERE t.trans_status = 'D' AND t.trans_date LIKE ? GROUP BY SUBSTRING(t.trans_date, 1, 7) ORDER BY SUBSTRING(t.trans_date, 1, 7) ASC", array($selectedDate . '%'));

      $data['cancelled'] = $this->db->raw("SELECT COUNT(t.trans_id) AS 'cancelled', t.trans_date FROM tbl_transaction AS t WHERE t.trans_status = 'C' AND t.trans_date LIKE ? GROUP BY SUBSTRING(t.trans_date, 1, 7) ORDER BY SUBSTRING(t.trans_date, 1, 7) ASC", array($selectedDate . '%'));
      return $data;
   }

   public function get_top_products($date = "")
   {
      if (strlen($date) == 0)
         $date = date('Y-m');

      $top_10 = $this->db->raw("SELECT p.prod_name, SUM(c.quantity) AS 'total_quan', SUM(c.quantity * c.price) AS 'total_price', c.price, (SELECT u.unit FROM tbl_unit AS u WHERE u.unit_id = p.prod_unit) AS 'unit' from tbl_cart as c INNER JOIN tbl_transaction as t ON c.trans_id = t.trans_id INNER JOIN tbl_product as p ON p.prod_id = c.prod_id WHERE t.trans_status = 'D' AND t.trans_date LIKE ? GROUP BY c.prod_id ORDER BY SUM(c.quantity) DESC, t.trans_date DESC LIMIT 10", array($date . "%"));

      $data['total'] = $this->db->raw('SELECT SUM(c.price * c.quantity) as "total" FROM tbl_cart as c INNER JOIN tbl_transaction as t ON c.trans_id = t.trans_id WHERE t.trans_status = "D" AND t.trans_date LIKE ?', array($date . "%"))[0]['total'];

      $data['prod_name'] = array();
      $data['total_quan'] = array();
      $data['total_price'] = array();
      $data['total_percent'] = array();
      $data['unit'] = array();

      for ($i = 0; $i < count($top_10); $i++) {
         array_push($data['prod_name'], $top_10[$i]['prod_name']);
         array_push($data['total_quan'], $top_10[$i]['total_quan']);
         array_push($data['total_price'], number_format($top_10[$i]['total_price'], 2, "."));
         array_push($data['unit'], $top_10[$i]['unit']);
         array_push($data['total_percent'], number_format((floatval($top_10[$i]['total_price']) / floatval($data['total'])) *100, 2, "."));
      }
      return $data;
   }
}
