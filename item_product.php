<div style="width:auto;cursor:pointer" class="col-2 m-1 border box">
    <div class="bg-image hover-zoom mt-2" style=" height:30vh;max-width:300px">
        <img id="myImg" src="images/<?=$rs['img_name']?>" alt="Snow" style="display:inline-block;min-height: 300px; max-height: 300px;width: 300px;">
    </div>
    <div class="teal" align="center" style="
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            ">
        <?=$rs['pd_name']?>
    </div>
    <div style="padding: 10px" class="divider">
        <div style="color: red; font-weight: bold"></div>
    </div>
    <div align="center">
        <a href="#" class="myButton"  onclick="go('product_detail.php?pdid=<?=$rs['pd_id']?>');">ดูรายละเอียด</a>
        <!-- <button class="btn btn-info mb-3">ดูรายละเอียด</button>&nbsp; -->
    </div>
</div>
