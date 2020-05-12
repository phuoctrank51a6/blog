<?php
function showError($errors,$name){
    if($errors->has($name))
    return '
    <div class="alert alert-danger">'.$errors->first($name) .'</div>
    ';
}
function getCategory($danhMuc, $idCha, $chuoiTab,$idChon) {
    // Lặp các phần tử trong danh mục
    foreach($danhMuc as $banGhi) {
        // Nếu 1 danh mục có parent_id bằng parent của danh mục cha
        if($banGhi['parent_id']==$idCha) {
            // Nếu id danh mục bằng id mặc định thì hiện thị
           if($banGhi['id']==$idChon)
           {
            echo  '<option selected value="'.$banGhi['id'].'">'.$chuoiTab.$banGhi['name'].'</option>';
           }
        //    Nếu không bằng thì hiện thị vẫn hiện thị
           else {
            echo  '<option value="'.$banGhi['id'].'">'.$chuoiTab.$banGhi['name'].'</option>';
           }
        //    lặp lại lần tiếp theo với $danhmuc, $id của danh mục lần tiếp theo chuối tab nếu $parent_id =
            getCategory($danhMuc, $banGhi['id'], $chuoiTab.'---|',$idChon);
        }
    }
}


function showCategory($danhMuc, $idCha, $chuoiTab) {
    foreach($danhMuc as $banGhi) {
        if($banGhi['parent_id']==$idCha) {
            echo '
            <div class="item-menu"><span>'.$chuoiTab.$banGhi['name'].'</span>
            <div class="category-fix">
                <a class="btn-category btn-primary" href="/admin/category/edit/'.$banGhi['id'].'"><i class="fa fa-edit"></i></a>
                <a class="btn-category btn-danger" href="/admin/category/del/'.$banGhi['id'].'"><i class="fas fa-times"></i></i></a>
            </div>
            </div>
            ';
            showCategory($danhMuc, $banGhi['id'], $chuoiTab.'---|');
        }

    }

}


function getLevel($danhMuc,$idCha,$cap)
{
	foreach($danhMuc as $banGhi)
	{
		if($banGhi['id']==$idCha)
		{
			$cap++;
			if($banGhi['parent_id']==0)
			{
				return $cap;
			}
		    return getLevel($danhMuc,$banGhi['parent_id'],$cap);

		}
	}
}
?>
