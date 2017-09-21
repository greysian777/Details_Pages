<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful
// require 'scraperwiki.php';
// require 'scraperwiki/simple_html_dom.php';
//
//require 'simple_html_dom.php';
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$links = array("https://forlap.ristekdikti.go.id/prodi/detail/N0NCQzZFMjMtNjE0OC00NEM3LUE0QTUtMTQzRTU5RDFCMDk5");
for($i = 0; $i < count($links); $i++)
 {
	 //Study Program Details 
   $first_tab_data = file_get_html($links[$i]);
   if($first_tab_data){
	   //First Tab Data..
	   	$html_encoded 			= html_entity_decode($first_tab_data);
		$Status_Prodi			= 	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[1]/td[3]",0)->plaintext;
		$Perguruan_Tinggi 		=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[2]/td[3]",0)->plaintext;
		$Kode  				=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[3]/td[3]",0)->plaintext;
		$Nama 				=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[4]/td[3]",0)->plaintext;
	    	$tanggal_berdiri		=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[5]/td[3]",0)->plaintext;
		$SK_Penyelenggaraan		=	$first_tab_data->find("//*[@id='umum']/table/tbody/tr[6]/td[3]",0)->plaintext;
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
		 $Name 		= 	$secondtab->find("td/a",0)->href;
		 $data = array($Name);
          for($loopo = 0 ; $loopo < sizeof($data); $loopo++)
          {
           $Lecturesprofiles = $data[$loopo];
		   if($Lecturesprofiles != "")
			{		
					 $Lecture_Details = file_get_html($Lecturesprofiles);
					if($Lecture_Details)
					{
						//This is for Lectres Details of 2nd Tab
						$nama_lec			  		= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[1]/td[3]",0)->plaintext;
						$perguruan_tinggi_lec 		= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[2]/td[3]",0)->plaintext;
						$program_studi_lec 			= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[3]/td[3]",0)->plaintext;
						$jenis_kelamin_lec	 		= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[4]/td[3]",0)->plaintext;
						$jabatan_fungsional_lec	 	= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[5]/td[3]",0)->plaintext;
						$pendidikan_tertinggi_lec	= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[6]/td[3]",0)->plaintext;
						$status_ikatan_kerja_lec	= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[7]/td[3]",0)->plaintext;
						$status_aktivitas_lec	 	= $Lecture_Details->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div[2]/div[2]/table/tbody/tr[8]/td[3]",0)->plaintext;
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
	    
		 $DAKUMENTPAGE = file_get_html($urls);
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
		   
 			  
		  $Pagestudent    =   file_get_html($URL);
			   
			   
		   if($Pagestudent)
		   {
			  
		   //This is Details of Students.
           $nama_student    			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[1]/td[3]",0)->plaintext;
           $jenis_student    			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[2]/td[3]",0)->plaintext;
           $perguruan_student     		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[4]/td[3]",0)->plaintext;
           $program_student      		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[5]/td[3]",0)->plaintext;
           $nomor_student       		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[6]/td[3]",0)->plaintext;
		   $semester_student  			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[7]/td[3]",0)->plaintext;
           $status_awal_student   		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[8]/td[3]",0)->plaintext;
           $status_mahasiswa_student 		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[9]/td[3]",0)->plaintext;
			   

 
		   
		   
		   }
					
					 $record = array( 'studyprogramlink' =>$links[$i], 'html_encoded' => $html_encoded ,'status_prodi' => $Status_Prodi ,'perguruan_tinggi' => $Perguruan_Tinggi,'kode' => $Kode , 'nama' => $Nama , 'tanggal_berdiri' => $tanggal_berdiri, 'sk_penyelenggaraan' => $SK_Penyelenggaraan, 'tanggal_sk' => $Tanggal_SK , 'rasio' => $Rasio, 'alamat' => $Alamat, 'kode_pos' => $Kode_Pos
  , 'telepon' => $Telepon
  , 'faximile' => $Faximile
  , 'email' => $email
  ,'site' => $site
  , 'url_of_student_details' => $URL
  ,'nama_student' => $nama_student
  ,'jenis_student' => $jenis_student
  ,'perguruan_student' => $perguruan_student
  ,'program_student' => $program_student
  ,'nomor_student' => $nomor_student
  ,'semester_student' => $semester_student
  ,'status_awal_student' => $status_awal_student
  ,'status_mahasiswa_student' => $status_mahasiswa_student
,'nama_lec' => $nama_lec
);
  
 scraperwiki::save(array('studyprogramlink','html_encoded','status_prodi','perguruan_tinggi','kode','nama','tanggal_berdiri','sk_penyelenggaraan','tanggal_sk','rasio','alamat','kode_pos','telepon','faximile','email','site'
			,'url_of_student_details'
			 ,'nama_student'
			,'jenis_student'
			,'perguruan_student'
			,'program_student'
			,'nomor_student'
			,'semester_student'
			,'status_awal_student'
			,'status_awal_student'
			,'nama_lec'
			), $record); } 
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
	}
	
   }
   
 }				
  
 
  }
   ?>
