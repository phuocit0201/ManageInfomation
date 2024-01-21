<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="<?= route('admin.invoice-create') ?>" method="post" class="col-12">
                <div>

                    <div class="form-group">
                        <label for="full_name" class="form-label" style="color: #014EC4;">Họ và tên người nộp
                            tiền</label>
                        <input type="text" name="data[name]" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mail" class="form-label" style="color: #014EC4;">Email</label>
                        <input type="email" name="data[email]" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="branch" class="form-label" style="color: #014EC4;">Đơn vị người nộp</label>
                        <select name="data[id_organization]" class="form-control">
                            <option value="">Chọn Đơn vị</option>
                            <?php foreach ($data['organizations'] as $organization) { ?>
                            <option value="<?=$organization['id']?>"><?=$organization['name']?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="branch" class="form-label" style="color: #014EC4;">Địa chỉ</label>
                        <select name="data[id_branches]" class="form-control">
                            <option value="">Chọn Chi bộ</option>
                            <?php foreach ($data['branches'] as $branch) { ?>
                            <option value="<?=$branch['id']?>"><?=$branch['name']?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name_invoice" class="form-label" style="color: #014EC4;">Nội dung</label>
                        <select name="data[name_invoice]" class="form-control">
                            <option value="">Chọn nội dung đóng đảng phí</option>
                            <option value="Đảng phí tháng 01 năm 2023">Đảng phí tháng 01 năm 2023</option>
                            <option value="Đảng phí tháng 02 năm 2023">Đảng phí tháng 02 năm 2023</option>
                            <option value="Đảng phí tháng 03 năm 2023">Đảng phí tháng 03 năm 2023</option>
                            <option value="Đảng phí tháng 04 năm 2023">Đảng phí tháng 04 năm 2023</option>
                            <option value="Đảng phí tháng 05 năm 2023">Đảng phí tháng 05 năm 2023</option>
                            <option value="Đảng phí tháng 06 năm 2023">Đảng phí tháng 06 năm 2023</option>
                            <option value="Đảng phí tháng 07 năm 2023">Đảng phí tháng 07 năm 2023</option>
                            <option value="Đảng phí tháng 08 năm 2023">Đảng phí tháng 08 năm 2023</option>
                            <option value="Đảng phí tháng 09 năm 2023">Đảng phí tháng 09 năm 2023</option>
                            <option value="Đảng phí tháng 10 năm 2023">Đảng phí tháng 10 năm 2023</option>
                            <option value="Đảng phí tháng 11 năm 2023">Đảng phí tháng 11 năm 2023</option>
                            <option value="Đảng phí tháng 12 năm 2023">Đảng phí tháng 12 năm 2023</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="slave_money" class="form-label" style="color: #014EC4;">Số tiền</label> <br>
                        <i for="slave_money" class="form-label" style="color: red;">Nhập số tiền dưới dạng dấu .</i>
                        <input type="text" name="data[slave_money]" class="form-control" id="slave_money_input">
                    </div>

                    <div class="form-group">
                        <label for="text_money" class="form-label" style="color: #014EC4;">Số tiền bằng chữ</label>
                        <input type="text" name="data[text_money]" class="form-control" id="text_money_input">  
                    </div>

                    <div class="form-group">
                        <label for="receive" class="form-label" style="color: #014EC4;">Người lập biểu</label>
                        <select name="data[receive_person_id]" class="form-control">
                        <option value="">Chọn người lập biểu</option>
                            <?php foreach ($data['receivePersons'] as $receivePerson) { ?>
                            <option value="<?=$receivePerson['id']?>"><?=$receivePerson['name']?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="payment" class="form-label" style="color: red;">Hình thức nộp Đảng phí</label>
                        <select name="data[payment]" class="form-control">
                            <option value="">Chọn hình thức nộp</option>
                            <option value="Tiền mặt">Tiền mặt</option>
                            <option value="Chuyển khoản">Chuyển khoản</option>
                        </select>
                    </div>

                    <div class="text-center" style="padding: 10px;">
                        <a href="<?= route('admin.invoice') ?>" class="btn btn-primary">
                            Quay lại bảng tổng hợp
                        </a>
                        <button class="btn btn-primary" type="submit" style="margin-left: 30px;">
                            Thêm phiếu thu
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
function convertNumberToWords(number) {
    const units = ["đồng.", "nghìn", "triệu", "tỷ"];

    let result = "";
    const chunks = number.split('.').reverse();

    for (let i in chunks) {
        const chunkWords = convertNumberToWord(chunks[i]);
        if (chunkWords.trim() !== "") {
            result = chunkWords + " " + units[i] + " " + result;
        }
    }
    result = result.trim();
    return result.charAt(0).toUpperCase() + result.slice(1);
}

function convertNumberToWord(number) {
    const words = ["", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín"];
    const units = ["", "mươi", "trăm"];
    let result = "";
    let i = 0;
    let num = number;
    while (number > 0) {
        let temp = number % 10;
        if (i == 0 && temp == 1 && number > 20 && number != 111 && number != 211 && number != 311 && number != 411 && number != 511 && number != 611 && number != 711 && number != 811 && number != 911) {
            result = "mốt " + result;
        } else if (i == 1 && temp == 1) {
            result = "mười " + result;
        } else if (i == 1 && temp == 0 && num%10 != 0) {
            result = "lẻ " + result;
        } else if (temp != 0) {
            result = words[temp] + " " + units[i] + " " + result;
        }
        number = parseInt(number / 10);
        i++;
    }
    result = result.trim();
    return result;
}

document.getElementById("slave_money_input").addEventListener("input", function() {
    const inputNumber = this.value;
    const textMoney = convertNumberToWords(inputNumber);
    document.getElementById("text_money_input").value = textMoney;
});

</script>