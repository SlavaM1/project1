function validateInsert() {
    let c_name = document.getElementById('insert_form').client_name.value;
    let f_name = document.getElementById('insert_form').furniture_name.value;
    let f_quantity = document.getElementById('insert_form').furniture_quantity.value;
    let s_date = document.getElementById('insert_form').sale_date.value;

    if (!c_name) {
        alert("Введите имя клиента");
        return false;
    } else if (!f_name) {
        alert("Введите cтрану!");
        return false;
    } else if (!f_quantity) {
        alert("Введите код болезни");
        return false;
    } else if (!s_date) {
        alert("Введите номер");
        return false;
    };
};

function nameInsert() {
    let q_name = document.getElementById('insert_form').name_user.value;
    let r_name = document.getElementById('insert_form').name_login.value;
    let q_quantity = document.getElementById('insert_form').name_pass.value;
    let q_date = document.getElementById('insert_form').rols_name.value;

    if (!q_name) {
        alert("Введите имя пользователя");
        return false;
    } else if (!r_name) {
        alert("Введите логин!");
        return false;
    } else if (!q_quantity) {
        alert("Введите пароль");
        return false;
    } else if (!q_date) {
        alert("Введите id");
        return false;
    };
};
