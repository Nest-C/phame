<div class="col-md-3">
        <div
            class="img-fluid"
            style="
            background-image: url('images/<?=$rs['img_name']?>');
            min-height: 200px;
            max-height: 200px;
            "
        ></div>
        <div
            class="teal"
            align="center"
            style="
            padding: 5px 5px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            "
        >
            <?=$rs['pd_name']?>
        </div>
        <div style="padding: 10px" class="divider">
            <div style="color: red; font-weight: bold"></div>
        </div>
        <div align="center">
            <br />
            <span
            class="btn orange"
            onclick="go('product_detail.php?pdid=<?=$rs['pd_id']?>');"
            >ดูรายละเอียด</span
            >&nbsp;
        </div>
    </div>
    
