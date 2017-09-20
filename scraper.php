<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful

// require 'scraperwiki.php';
// require 'scraperwiki/simple_html_dom.php';
//

//require 'simple_html_dom.php';

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$links = array("https://forlap.ristekdikti.go.id/prodi/detail/M0VEMjk1MjQtMjhDMS00NzU3LTlFREYtMEEwRTlFQUMwNjk3","https://forlap.ristekdikti.go.id/prodi/detail/RjVFNTU2QUItMEM5Mi00ODU4LTkzNTAtRDA5NEMwRUZGOTUx","https://forlap.ristekdikti.go.id/prodi/detail/N0NCQzZFMjMtNjE0OC00NEM3LUE0QTUtMTQzRTU5RDFCMDk5");
for($i = 0; $i < count($links); $i++)
 {
	 //Study Program Details 
   $first_tab_data = file_get_html($links[$i]);
   if($first_tab_data){
	   //First Tab Data..
		$Status_Prodi		= 	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[1]/td[3]",0)->plaintext;
		$Perguruan_Tinggi 	=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[2]/td[3]",0)->plaintext;
		$Kode  				=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[3]/td[3]",0)->plaintext;
		$Nama 				=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[4]/td[3]",0)->plaintext;
	    $Tanggal_Berdiri	=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[5]/td[3]",0)->plaintext;
		$SK_Penyelenggaraan	=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[6]/td[3]",0)->plaintext;
		$Tanggal_SK			=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[7]/td[3]",0)->plaintext;
		$Rasio 				=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[8]/td[3]",0)->plaintext;
		$Alamat				=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[10]/td[3]",0)->plaintext;
		$Kode_Pos			=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[11]/td[3]",0)->plaintext;
		$Telepon			=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[12]/td[3]",0)->plaintext;
		$Faximile			=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[13]/td[3]",0)->plaintext;
		$email				=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[14]/td[3]",0)->plaintext;
		$site				=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[15]/td[3]",0)->plaintext;
		
		//	echo $Status_Prodi.'<br/>'.$Perguruan_Tinggi.'<br/>'.$Kode.'<br/>'.$Nama.'<br/>'.$Tanggal_Berdiri.'<br/>'.$SK_Penyelenggaraan.'<br/>'.$Tanggal_SK
		//		 .'<br/>'.$Rasio.'<br/>'.$Alamat.'<br/>'.$Kode_Pos.'<br/>'.$Telepon.'<br/>'.$Faximile.'<br/>'.$email.'<br/>'.$site.'<br/>'.$links[$i];
//-----------------------------------------------------------------------------------------------------------------------------------------------
$Checking = $first_tab_data->find("//*[@id='dosen']/table/tbody/tr[2]/td",0)->plaintext;

if($Checking != "Data tidak ditemukan")
{
//This is for 2nd Tab
foreach($first_tab_data->find("//*[@id='dosen']/table/tbody/tr") as $secondtab)
     {
		 $Name 		= 	$secondtab->find("td[2]/a",0)->href;
		 $data = array($Name);
          for($loopo = 0 ; $loopo < sizeof($data); $loopo++)
          {
           $Lecturesprofiles = $data[$loopo];
		   if($Lecturesprofiles != "")
			{		
					echo $Lecture_Details = file_get_html($Lecturesprofiles);
					if($Lecture_Details)
					{
						//This is for Lectres Details of 2nd Tab
						$Nama_Lec 			  		= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[1]/td[3]",0)->plaintext;
						$Perguruan_Tinggi_Lec 		= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[2]/td[3]",0)->plaintext;
						$Program_Studi_Lec 			= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[3]/td[3]",0)->plaintext;
						$Jenis_Kelamin_Lec	 		= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[4]/td[3]",0)->plaintext;
						$Jabatan_Fungsional_Lec	 	= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[5]/td[3]",0)->plaintext;
						$Pendidikan_Tertinggi_Lec	= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[6]/td[3]",0)->plaintext;
						$Status_Ikatan_Kerja_Lec	= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[7]/td[3]",0)->plaintext;
						$Status_Aktivitas_Lec	 	= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[8]/td[3]",0)->plaintext;
						
					/*	echo '<br/>'.$Nama .'<br/>'.$Perguruan_Tinggi .'<br/>'.$Program_Studi.'<br/>'.$Jenis_Kelamin.'<br/>'.$Jabatan_Fungsional.'<br/>'.$Pendidikan_Tertinggi.'<br/>'.$Status_Ikatan_Kerja.'<br/>'.$Status_Aktivitas.'<br/>';
						echo '--------------------------------------------'; */
				
					}
			}
	 
				 
				 
		  }
   
	}
}
	//Checking Data in  Mahasiswa
	$Checking_Mahasiwa  = $first_tab_data->find("//*[@id='mahasiswa']/table/tbody/tr[2]/td",0)->plaintext;
	if($Checking_Mahasiwa != "Data tidak ditemukan")
	{
	foreach($first_tab_data->find("//[@id='mahasiswa']/table/tbody/tr") as $element)
     {
      $totalcountofstudenteachsemester = $element->find("td[3]/a" , 0)->plaintext;
      $number = $totalcountofstudenteachsemester / 20;
      $Pages =(int)$number;
      $student  = $element->find("td[3]/a" , 0)->href;
        for($loop = 0; $loop <= $totalcountofstudenteachsemester; $loop+=20)
      {
       
       $urls =  $student . "/". $loop;
	   
       if($urls != "/0")
       {
	    
		echo $DAKUMENTPAGE = file_get_html($urls);
        if($DAKUMENTPAGE)
        {
         foreach($DAKUMENTPAGE->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr") as $SARTOUT)
         {
		  $SerNo = $SARTOUT->find("td", 0)->plaintext;
          $NIM = $SARTOUT->find("td", 1)->plaintext;
          $Name = $SARTOUT->find("td" , 2)->plaintext;
          $Namehref = $SARTOUT->find("td/a" , 0)->href;
		  
		  $URLOFMAHASIWA = array($Namehref);
          for($loopo = 0 ; $loopo < sizeof($URLOFMAHASIWA); $loopo++)
          {
           $URL = $URLOFMAHASIWA[$loopo];
		   if($URL != "")
			{
		   
 			  
		  echo $Pagestudent    =   file_get_html($URL);
			   
			   
		   if($Pagestudent)
		   {
			  
		   //This is Details of Students.
           $Nama_Student    			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[1]/td[3]",0)->plaintext;
           $Jenis_Student    			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[2]/td[3]",0)->plaintext;
           $Perguruan_Student     		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[4]/td[3]",0)->plaintext;
           $Program_Student      		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[5]/td[3]",0)->plaintext;
           $Nomor_Student       		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[6]/td[3]",0)->plaintext;
	   $Semester_Student  			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[7]/td[3]",0)->plaintext;
           $Status_Awal_Student   		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[8]/td[3]",0)->plaintext;
           $Status_Mahasiswa_Student 		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[9]/td[3]",0)->plaintext;
		   }
			}
		  }
		 }
		}
	   }
	  }
	}
	
   }
   
 }	
 //	$links[$i]
 //	echo $Status_Prodi.'<br/>'.$Perguruan_Tinggi.'<br/>'.$Kode.'<br/>'.$Nama.'<br/>'.$Tanggal_Berdiri.'<br/>'.$SK_Penyelenggaraan.'<br/>'.$Tanggal_SK
		//		 .'<br/>'.$Rasio.'<br/>'.$Alamat.'<br/>'.$Kode_Pos.'<br/>'.$Telepon.'<br/>'.$Faximile.'<br/>'.$email.'<br/>'.$site.'<br/>'.;
 
  $record = array( 'studyprogramlink' =>$links[$i], 'Status_Prodi' => $Status_Prodi ,'Perguruan_Tinggi' => $Perguruan_Tinggi,'Kode' => $Kode , 'Nama' => $Nama , 'Tanggal_Berdiri' => $Tanggal_Berdiri, 'SK_Penyelenggaraan' => $SK_Penyelenggaraan, 'Tanggal_SK' => $Tanggal_SK , 'Rasio' => $Rasio, 'Alamat' => $Alamat, 'Kode_Pos' => $Kode_Pos
  , 'Telepon' => $Telepon
  , 'Faximile' => $Faximile
  , 'email' => $email
  , 'site' => $site);
 scraperwiki::save(array('studyprogramlink','Status_Prodi','Perguruan_Tinggi','Kode','Nama','Tanggal_Berdiri','SK_Penyelenggaraan','Tanggal_SK','Rasio','Alamat','Kode_Pos','Telepon','Faximile','email','site'), $record); 
 }
   ?>
