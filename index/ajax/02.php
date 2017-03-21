<?php 
	$uname = $_GET['uname'];
	$bookes = array();
	$bookes["sgyy"] = array("bookname"=>"三国演义","autor"=>"罗贯中","desc"=>"三国鼎立");
	$bookes["xyj"] = array("bookname"=>"西游记","autor"=>"施耐庵","desc"=>"取西经");
	$bookes["shz"] = array("bookname"=>"水浒传","autor"=>"吴承恩","desc"=>"108位好汉");
	$bookes["hlm"] = array("bookname"=>"红楼梦","autor"=>"曹雪芹","desc"=>"封建贵族");
	if( array_key_exists($uname,$bookes) == 1 ){
		$book = $bookes[$uname];
		echo json_encode($book);
	}else{
		echo '{"flog":0}';
	};
 ?>