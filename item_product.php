<div style="width:auto;cursor:pointer" class="col-2 m-1 border hover-shadow">
    <div class="bg-image hover-zoom" style=" height:30vh;max-width:300px">
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
        <button class="btn btn-info mb-3" onclick="go('product_detail.php?pdid=<?=$rs['pd_id']?>');">ดูรายละเอียด</button>&nbsp;
    </div>
</div>
