/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    $('#envoyer').on("click", function() {
        var valid = true;
        
        if ($("#nom").val() === "") {
            $("#nom").css("border-color", "red");
            valid = false;
        } else {
            $("#nom").css("border-color", "#95a5a6");
            valid = true;
        }

        if ($("#email").val() === "") {
            $("#email").css("border-color", "red");
            valid = false;
        } else {
            $("#email").css("border-color", "#95a5a6");
            valid = true;
        }

        if ($("#texta").val() === "") {
            $("#texta").css("border-color", "red");
            valid = false;
        } else {
            $("#texta").css("border-color", "#95a5a6");
            valid = true;
        }

        return valid;
    });
});