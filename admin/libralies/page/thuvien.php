<?php
//Xây dựng thư viện phục vụ phân trang
//Viết code theo hướng đối tượng : sử dụng class

//$mysql_host='localhost';
//$mysql_user='root';
//$mysql_pass='';
//
//$conn=mysql_connect($mysql_host,$mysql_user,$mysql_pass);
//if(!($conn)) echo 'loi';
//if(!mysql_select_db("joomla"))echo 'loi';
//mysql_query("SET NAMES 'utf8'");

class thuvien
{
	//Tạo 2 thuộc tính: Tổng số phần tử, số phần tử/ 1 trang
	public $tong=0,$page=0;
	private $tongpage=0;//Tổng số trang tính đc: sử dụng nội bộ
	//1: Xây dựng phương thức (hàm) tính số lượng trang
	public function numpage()
	{
		//Tính số dữ giữa tong và page
		$sodu=$this->tong%$this->page;
		//Kiểm tra giá trị của số dư tính đc
		if($sodu==0) $this->tongpage=$this->tong/$this->page;
		else $this->tongpage=($this->tong-$sodu)/$this->page + 1 ;
	}
	public $link='';//Mẫu index.php?n=
	//2: Xây dựng phương thức (hàm) để in ra phần phân trang (các đường link)
	public $n;
	public function viewpage()
	{
		
		//Sử dụng vòng lặp để in ra số lượng trang
		for($i=1;$i<=$this->tongpage;$i++)
		{
			
			if($this->n==$i)
			echo '<a href="'.$this->link.$i.'" class="active">'.$i.'</a> ';
			else
			echo '<a href="'.$this->link.$i.'">'.$i.'</a> ';
		}	
	}	
}


?>