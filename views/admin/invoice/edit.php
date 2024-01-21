<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="<?= route('admin.invoice_edit') ?>" method="post" class="col-12">
                <div>
                    <input type="text" value="<?=$data['invoice']['id']?>" name="data[id]" class="form-control" hidden>
                    <div class="form-group">
                        <label for="full_name" class="form-label" style="color: #014EC4;">Họ và tên người nộp
                            tiền</label>
                        <input type="text" value="<?=$data['invoice']['name']?>" name="data[name]" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mail" class="form-label" style="color: #014EC4;">Email</label>
                        <input type="text" value="<?=$data['invoice']['email']?>" name="data[email]" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="branch" class="form-label" style="color: #014EC4;">Đơn vị người nộp</label>
                        <select name="data[id_organization]" class="form-control">
                            <?php foreach ($data['organizations'] as $organization) { ?>
                            <?php if ($data['invoice']['id_organization'] == $organization['id']){ ?>
                            <option selected value="<?= $organization['id'] ?>"><?=$organization['name'] ?></option>
                            <?php } else {?>
                            <option value="<?=$organization['id'] ?>"><?=$organization['name'] ?></option>
                            <?php }}?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="branch" class="form-label" style="color: #014EC4;">Địa chỉ</label>
                        <select name="data[id_branches]" class="form-control">
                            <?php foreach ($data['branches'] as $branch) { ?>
                            <?php if ($data['invoice']['id_branches'] == $branch['id']){ ?>
                            <option selected value="<?= $branch['id'] ?>"><?=$branch['name'] ?></option>
                            <?php } else {?>
                            <option value="<?=$branch['id'] ?>"><?=$branch['name'] ?></option>
                            <?php }}?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name_invoice" class="form-label" style="color: #014EC4;">Nội dung</label>
                        <input type="text" value="<?=$data['invoice']['name_invoice']?>" name="data[name_invoice]" class="form-control">
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="slave_money" class="form-label" style="color: #014EC4;">Số tiền</label> <br>
                    <i for="slave_money" class="form-label" style="color: red;">Nhập số tiền dưới dạng dấu .</i>
                    <input type="text" name="data[slave_money]" class="form-control" id="slave_money_input" value="<?=$data['invoice']['slave_money']?>">
                </div>

                    <div class="form-group">
                        <label for="text_money" class="form-label" style="color: #014EC4;">Số tiền bằng chữ</label>
                        <input type="text"  name="data[text_money]" class="form-control" id="text_money_input">  
                    </div>

                    <div class="form-group">
                        <label for="receive" class="form-label" style="color: #014EC4;">Người lập biểu</label>
                            <select name="data[receive_person_id]" class="form-control">
                            <?php foreach ($data['receivePersons'] as $receive_person) { ?>
                                <?php if ($data['invoice']['receive_person_id'] == $receive_person['id']){ ?>
                                    <option selected value="<?= $receive_person['id'] ?>"><?=$receive_person['name'] ?></option>
                                <?php } else { ?>
                                    <option value="<?=$receive_person['id'] ?>"><?=$receive_person['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="payment" class="form-label" style="color: red;">Hình thức nộp Đảng phí</label>
                        <input type="text" value="<?=$data['invoice']['payment']?>" name="data[payment]" class="form-control"> 
                    </div>

                    <div class="text-center" style="padding: 10px;">
                        <a href="<?= route('admin.invoice') ?>" class="btn btn-primary">
                            Quay lại bảng tổng hợp
                        </a>
                        <button class="btn btn-primary" type="submit" style="margin-left: 30px;">
                            Cập nhật và In mới phiếu thu
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
            } else if (i == 1 && temp == 0 && num % 10 != 0) {
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

    function updateTextMoneyInput() {
        const inputNumber = document.getElementById("slave_money_input").value;
        const textMoney = convertNumberToWords(inputNumber);
        document.getElementById("text_money_input").value = textMoney;
    }

    // Call the function on page load
    window.onload = function () {
        updateTextMoneyInput();
    };

    // Call the function on input change
    document.getElementById("slave_money_input").addEventListener("input", updateTextMoneyInput);
</script>