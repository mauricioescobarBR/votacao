function confirm_reuniao_modal(url, description, is_open) {
    $('#reuniao_modal').modal('show', {backdrop: 'static', keyboard: false});
    $('#reuniao_modal .is_open').text(is_open);
    $("#reuniao_modal .grt").text(description);
    document.getElementById('reuniao_abrir_link').setAttribute("formaction", url);
    document.getElementById('reuniao_abrir_link').focus();
};

(function () {
    'use strict';

    angular
        .module('app', ['btford.socket-io', 'ui.bootstrap', 'angular-spinkit'])
        .controller('RegistraReuniaoController', RegistraReuniaoController)
        .controller('VotarItemDePautaController', VotarItemDePautaController)
        .controller('EncaminhamentoController', EncaminhamentoController)
        .factory('socket', function (socketFactory) {
            return socketFactory({
                prefix: 'socket',
                ioSocket: io.connect('http://localhost:3001')
            });
        });

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

    VotarItemDePautaController.$inject = ['socket'];

    function VotarItemDePautaController(socket) {

        var vm = this;

        vm.itemDePauta = {};

        socket.on('encaminhamento', function (ev, data) {
            console.log('aqui 2!');
            console.log(data);

            vm.itemDePauta = data;
        });

    }

    EncaminhamentoController.$inject = ['$scope', '$http', '$location'];

    function EncaminhamentoController($scope, $http, $location) {

        var vm = this;

        vm.itemId = $location.absUrl().split(/[\s/]+/).pop();
        console.log(vm.itemId);

        vm.itemDeVoto = {
            id: '',
            descricao: ''
        };
        vm.itensDeVoto = [];

        vm.data = {
            itemId: vm.itemId,
            encaminhamentos: vm.itensDeVoto
        }

        vm.opcao = "";

        vm.adicionaItem = adicionaItem;
        vm.remove = remove;
        vm.envia = envia;

        function adicionaItem() {
            if (vm.itemDeVoto.descricao != "") {
                vm.itensDeVoto.push(vm.itemDeVoto);

                vm.itemDeVoto = {
                    id: "",
                    descricao: ""
                };
            }
        }

        function remove(item) {
            var index = vm.itensDeVoto.indexOf(item);
            vm.itensDeVoto.splice(index, 1);
        }

        function envia() {
            console.log(vm.data);

            if (true) {
                if (vm.opcao == "PADRAO") {
                    vm.itensDeVoto = [];
                    vm.itensDeVoto.push({id: '', descricao: "A Favor"});
                    vm.itensDeVoto.push({id: '', descricao: "Contrário"});
                    vm.itensDeVoto.push({id: '', descricao: "Abstenção"});

                    vm.data = {
                        itemId: vm.itemId,
                        encaminhamentos: vm.itensDeVoto
                    }

                    $http({
                        url: 'http://localhost/votacao/instalacao-ci/index.php/set_encaminhamentos',
                        method: "POST",
                        data: {'data': vm.data}
                    })
                        .then(function (response) {
                                console.log(response);
                            },
                            function (response) { // optional
                                console.log(response);
                            });
                } else if (vm.opcao == "CUSTOMIZADO") {
                    vm.data = {
                        itemId: vm.itemId,
                        encaminhamentos: vm.itensDeVoto
                    }

                    $http({
                        url: 'http://localhost/votacao/instalacao-ci/index.php/set_encaminhamentos',
                        method: "POST",
                        data: {'data': vm.data}
                    })
                        .then(function (response) {
                                console.log(response);
                            },
                            function (response) { // optional
                                console.log(response);
                            });
                }
            }
        }

        $scope.$watch('vm.itemDeVoto', function (current, original) {
            console.log(current);
            console.log(original);
        });
    }
})();