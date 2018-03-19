$(function () {
    var regLink = document.getElementById("regLink"),
        loginLink = document.getElementById("loginLink"),
        elemsDel = document.getElementsByClassName('del'),
        elemsEdit = document.getElementsByClassName('edit'),
        delConfirmNo = document.getElementById('delConfirmNo'),
        editConfirmNo = document.getElementById('editConfirmNo'),
        delConfirmYes = document.getElementById('delConfirmYes'),
        newUserEmail = document.getElementById('newUserEmail'),
		del = document.getElementById('legendDelete');

    if (delConfirmNo) {
        delConfirmNo.onclick = function () {
            $("#delForm").slideUp();
            document.cookie = "user=";
            return false;
        };
    }


    if (delConfirmYes) {
        delConfirmYes.onclick = function () {
            $("#delForm").slideUp();
            return true;
        };

    }

    if (editConfirmNo) {
        editConfirmNo.onclick = function () {
            $("#editForm").slideUp();
            document.cookie = "user=";
            return false;
        };
    }


    if (regLink) {
        regLink.addEventListener("click", function () {
            if ($("#regForm").css("display") != "block") {
                $("#regForm").offset({top: 50});
                $("#regForm").slideDown();
            } else {
                $("#regForm").slideUp();
            }

        });
    }


    if (loginLink) {
        loginLink.addEventListener("click", function () {
            if ($("#loginForm").css("display") != "block") {
                $("#loginForm").offset({top: 50});
                $("#loginForm").slideDown();
            } else {
                $("#loginForm").slideUp();
            }
        });
    }


    if (elemsDel) {
        for (var i = 0; i < elemsDel.length; i++) { //каждому del назначаем событие при клике
            elemsDel[i].onclick = function (e) {
                var email = e.currentTarget.value; //текущий email
				
				del.innerHTML = "Confirm delete user " + email + " ?";
                $("#delForm").offset({right: e.pageX, top: e.pageY});
                $("#delForm").slideDown();
                document.cookie = "user=" + email;
            };

        }
    }

    if (elemsEdit) {
        for (var i = 0; i < elemsEdit.length; i++) { //каждому edit назначаем событие при клике
            elemsEdit[i].onclick = function (e) {
                var email = e.currentTarget.value; //текущий email

                newUserEmail.value = email;
                $("#editForm").offset({right: e.pageX, top: e.pageY});
                $("#editForm").slideDown();
                document.cookie = "user=" + email;
            };

        }
    }


    //Закриває вікно collapse при кліку миші поза ним
    $(document).mouseup(function (e) { // событие клика по веб-документу
        var elem = $(".collapse"); // тут указываем class элемента

        if (!elem.is(e.target) // если клик был не по нашему блоку
            && elem.has(e.target).length === 0) { // и не по его дочерним элементам
            elem.slideUp(); // скрываем его
            document.cookie = "user=";
        }

    });
});