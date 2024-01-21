<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <title>PHIẾU THU ĐẢNG PHÍ</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="main.css"> -->
        <title>PHIẾU THU ĐẢNG PHÍ</title>
    </head>

    <body>
        <style>
        body {
            page-break-inside: avoid;
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
        }

        @page {
            size: A4;
            /* Định kích thước giấy in, có thể sử dụng mm, cm, in, px, ... */
            margin-left: 1cm;
            /* Định lề cho trang in */
        }

        @media print {

            /* Đặt các thiết lập in ấn ở đây */
            body {
                font-size: 14pt;
            }

            body div {
                display: block;
            }

            .header-main span {
                font-size: 24pt;
            }

            .print-only {
                display: block;
            }

            .no-print {
                display: none;
            }

            div {
                display: none;
            }

            body {
                page-break-after: always;
            }

        }

        #pdf-form {
            width: 210mm;
            height: 297mm;
            margin: 0 auto;
            padding-left: 30px;
            display: flex;
            flex-flow: column;
            justify-content: space-between;
        }

        .lien {
            margin: 10px 0px;
        }

        .Head {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .head-left {
            width: 60%;
            display: flex;
            flex-flow: column;
        }

        .head-right {
            width: 40%;
            display: flex;
            flex-flow: column;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            position: relative;
        }

        .header-main {
            justify-content: center;
            align-items: center;
            display: flex;
            flex-flow: column;
            width: 100%;
        }

        .header-right {
            position: absolute;
            display: flex;
            flex-flow: column;
            left: 580px;
        }

        .content {
            margin-bottom: 10px;
            display: flex;
            flex-flow: column;
        }

        .lapbieu {
            display: flex;
            justify-content: space-between;
            /* margin-bottom: 80px; */
        }

        .confirm {
            margin-bottom: 10px;
        }

        .date-submit {
            margin-bottom: 10px;
            padding-left: 550px;
        }

        .sign {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .sign-content {
            margin-left: 70px;
            margin-right: 70px;
            align-items: center;
            display: flex;
            flex-flow: column;
            font-weight: bold;
        }

        .sign-content div {
            height: 70px;
            display: block;
            padding: -10px;
        }


        .span {
            display: block;
            width: 100%;
            text-align: center;
        }

        .Head .head-left span {
            font-size: 16px;
        }

        .Head .head-right span {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .Head .head-right p {
            font-size: 16px;
            text-align: center;
        }

        .header .header-main span {
            font-size: 17px;
            font-weight: bold;
        }
        .header .header-right span {
            font-size: 16px;
        }

        .content span {
            font-size: 17px;
        }

        .content strong {
            font-weight: bold;
        }

        .lapbieu div {
            text-align: center;
            width: 33%;
            font-size: 17px;
            font-weight: bold;
            justify-content: center;
        }

        .confirm {
            display: flex;
            padding-right: 10px;
        }

        .confirm div {
            margin-left: 10px;
            font-size: 17px;
            display: flex;
            flex-direction: column;
        }

        .date-submit span {
            font-size: 17px !important;
        }

        .sign div {
            font-size: 13px;
        }

        .sign div span {
            font-size: 14px;
            
            
        }
        </style>
        <div id="pdf-form" class="print-only">
            <div class="lien">
                <div class="Head">
                    <div class="head-left">
                        <span>
                            Đơn vị: ĐẢNG ỦY TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT <br> THÀNH PHỐ HỒ CHÍ MINH
                        </span>
                        <span>
                            Mã QHNS:
                        </span>
                    </div>
                    <div class="head-right">
                        <span>
                            Mẫu số: C40-BB
                        </span>
                        <p>
                            (Ban hành kèm theo TT số 107/2017/TT-BTC ngày 10/10/2017 của Bộ Tài chính)
                        </p>
                    </div>
                </div>
                <div class="header">
                    <div class="header-main">
                        <span>
                            PHIẾU THU
                        </span>
                        <span><strong><?=$data['invoice']['created_at'] ?></strong></span>
                        <span>Số:</span>
                    </div>
                    <div class="header-right">
                        <span> <b>Liên 1</b> </span>
                        <span>Quyển số:</span>
                        <span>Nợ:</span>
                        <span>Có:</span>
                    </div>
                </div>
                <div class="content">
                    <span>Họ và tên người nộp tiền: <strong><?=$data['invoice']['name'] ?></strong></span>
                    <span>Địa chỉ:<strong><?=$data['invoice']['name_branch']?></strong></span>
                    <span>Nội dung: <strong><?=$data['invoice']['name_invoice'] ?></strong></span>
                    <span>Số tiền:<strong><?=$data['invoice']['slave_money'] ?>Đ;</strong> Bằng chữ: <?=$data['invoice']['text_money']?></span>
                </div>
                <div class="lapbieu">
                    <div>Thủ trưởng đơn vị</div>
                    <div>Kế toán</div>
                    <div class="sign-content">
                        <span style="font-size: 16px;">Người lập biểu</span>
                        <div></div>
                        <span style="font-size: 16px;">Nguyễn Thị Phương Nam</span>
                    </div>
                </div>
                <div class="confirm">
                    <div>Đã nhận đủ số tiền</div>
                    <div>
                        <span>-Bằng số: <strong><?=$data['invoice']['slave_money']; ?>Đ</strong> </span>
                        <span>-Bằng chữ: <?=$data['invoice']['text_money'] ?></span>
                    </div>
                </div>
                <div class="date-submit" style="font-size: 17px;">
                <span><?=$data['invoice']['created_at'] ?></span>
                </div>
                <div class="sign">
                    <div class="sign-content">
                        <span style="font-size: 16px;">NGƯỜI NỘP</span>
                        <div></div>
                        <span style="font-size: 16px;"><?=$data['invoice']['name'] ?></span>
                    </div>
                    <div class="sign-content">
                        <span style="font-size: 16px;">THỦ QUỸ</span>
                        <div></div>
                        <span style="font-size: 16px;">Nguyễn Thị Phương Nam</span>
                    </div>
                </div>
            </div>

            <span style="font-size: 20px;font-weight: bold;"> 
            ---------------------------------------------------------------------------------------------------------------------</span>

            <div class="lien">
                <div class="Head">
                    <div class="head-left">
                        <span>
                            Đơn vị: ĐẢNG ỦY TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT THÀNH PHỐ HỒ CHÍ MINH
                        </span>
                        <span>
                            Mã QHNS:
                        </span>
                    </div>
                    <div class="head-right">
                        <span>
                            Mẫu số: C40-BB
                        </span>
                        <p>
                            (Ban hành kèm theo TT số 107/2017/TT-BTC ngày 10/10/2017 của Bộ Tài chính)
                        </p>
                    </div>
                </div>
                <div class="header">
                    <div class="header-main">
                        <span>
                            PHIẾU THU
                        </span>
                        <span><strong><?=$data['invoice']['created_at'] ?></strong></span>
                        <span>Số:</span>
                    </div>
                    <div class="header-right">
                        <span> <b>Liên 2</b> </span>
                        <span>Quyển số:</span>
                        <span>Nợ:</span>
                        <span>Có:</span>
                    </div>
                </div>
                <div class="content">
                    <span>Họ và tên người nộp tiền: <strong><?=$data['invoice']['name'] ?></strong></span>
                    <span>Địa chỉ:<strong><?=$data['invoice']['name_branch']?></strong></span>
                    <span>Nội dung: <strong><?=$data['invoice']['name_invoice'] ?></strong></span>
                    <span>Số tiền:<strong><?=$data['invoice']['slave_money'] ?>Đ;</strong> Bằng chữ: <?=$data['invoice']['text_money']?></span>
                </div>
                <div class="lapbieu">
                    <div>Thủ trưởng đơn vị</div>
                    <div>Kế toán</div>
                    <div class="sign-content">
                        <span style="font-size: 16px;">Người lập biểu</span>
                        <div></div>
                        <span style="font-size: 16px;">Nguyễn Thị Phương Nam</span>
                    </div>
                </div>
                <div class="confirm">
                    <div>Đã nhận đủ số tiền</div>
                    <div>
                        <span>-Bằng số: <strong><?=$data['invoice']['slave_money']; ?>Đ</strong> </span>
                        <span>-Bằng chữ: <?=$data['invoice']['text_money'] ?></span>
                    </div>
                </div>
                <div class="date-submit" style="font-size: 17px;">
                <span><?=$data['invoice']['created_at'] ?></span>
                </div>
                <div class="sign">
                    <div class="sign-content">
                        <span style="font-size: 16px;">NGƯỜI NỘP</span>
                        <div></div>
                        <span style="font-size: 16px;"><?=$data['invoice']['name'] ?></span>
                    </div>
                    <div class="sign-content">
                        <span style="font-size: 16px;">THỦ QUỸ</span>
                        <div></div>
                        <span style="font-size: 16px;">Nguyễn Thị Phương Nam</span>
                    </div>
                </div>
            </div>
        </div>


    </body>
    <script>
        
    window.print();
    window.onafterprint = async function() {
        window.location.href = `<?php echo route("admin.invoice"); ?>`;
    }
    </script>

    </html>