if($_SERVER['REQUEST_METHOD']=="POST")
  {
    if (isset($_FILES['file'])) {
      include 'simplexlsx.class.php';


      $xlsx = new SimpleXLSX($_FILES['file']['tmp_name']);
      list($num_cols, $num_rows) = $xlsx->dimension();
      $f = 0;
      $data = array();
      foreach( $xlsx->rows() as $r ) 
      {

        if ($f == 0)
        {
          $f++;
          continue;
        }
        for( $i=0; $i < $num_cols; $i++ )
        {
          if ($i == 0)      $data['expenses_amount']      = $r[$i];
          else if ($i == 1) $data['expenses_type_id']   = $r[$i];
          else if ($i == 2) $data['expenses_date']    = $r[$i];
          else if ($i == 3) $data['procured_bystaff']     = $r[$i];
          else if ($i == 4) $data['procured_byproject'] = $r[$i];
          else if ($i == 5) $data['expenses_desc']  = $r[$i];
          $first=$r[0];
          $second=self::getextypeid($r[1]);
          $third=$r[2];
          $fourth=self::getstaffid($r[3]);
          $fifth=self::getprojectid($r[4]);
          $sixth=$r[5];
        }
        $sql="INSERT INTO expenses (expenses_amount,expenses_type_id,expenses_date,procured_bystaff,procured_byproject,expenses_desc) VALUES ('$first','$second','$third','$fourth','$fifth','$sixth')";
        $query=expensesmgt::calldb()->query($sql);

      }

    }
  }