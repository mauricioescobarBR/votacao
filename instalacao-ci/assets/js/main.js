function confirm_reuniao_modal(url, description, is_open) {
    $('#reuniao_modal').modal('show', {backdrop: 'static', keyboard: false});
    $('#reuniao_modal .is_open').text(is_open);
    $("#reuniao_modal .grt").text(description);
    document.getElementById('reuniao_abrir_link').setAttribute("formaction", url);
    document.getElementById('reuniao_abrir_link').focus();
};

(function() {
    'use strict';

    angular
        .module('app', ['btford.socket-io', 'ui.bootstrap', 'angular-spinkit'])
        .controller('RegistraReuniaoController', RegistraReuniaoController);

    RegistraReuniaoController.$inject = ['$http'];

    function RegistraReuniaoController($http) {

        var vm = this;

        vm.reunioes = {};

        getReunioes();

        function getReunioes() {
            $http.get("http://localhost/votacao/instalacao-ci/api/reunioes/").then(function (data) {
                vm.reunioes = data;

                console.log(vm.reunioes);
            }).catch(function (error) {
                console.log(error);
            });
        }

    }
})();