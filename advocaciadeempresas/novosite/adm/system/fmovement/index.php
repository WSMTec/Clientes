<main class="content">    <header class="header-box">        <h2 class="header-box-h">Contas a pagar</h2>        <div class="header-box-btn"><!--            <button data-modalopen=".app_modal_replic" class="btn-default btn-clean btn-rigth unificarbtn"><span class="lnr lnr-plus-circle"></span> Replicar</button>-->            <!--<button data-modalopen=".app_modal_multbaixa" class="btn-default btn-clean btn-rigth multbaixarbtn"><span class="lnr lnr-enter-down"></span> Mult. Baixa</button>-->            <a class="btn-default btn-blue" href="?exe=billstopay/create"><span class="lnr lnr-plus-circle"></span> Nova movimentação</a>        </div>    </header>    <div class="box" style="overflow-y: auto;">        <table id="" class="table table-striped table-bordered" style="width:100%">            <thead>                <tr>                    <th>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-calendar-full"></span>                            Situaçãodaa;                         </div>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-file-empty"></span>                             Vencimento                        </div>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-calendar-full"></span>                            D. Baixa                        </div>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-clock"></span>                             Origem                        </div>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-clock"></span>                             Valor T                        </div>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-clock"></span>                             Valor P                        </div>                    </th>                    <th></th>                </tr>            </thead>            <tfoot>                <tr>                    <th>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-calendar-full"></span>                            Situação                        </div>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-file-empty"></span>                             Vencimento                        </div>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-calendar-full"></span>                            D. Baixa                        </div>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-clock"></span>                             Origem                        </div>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-clock"></span>                             Valor T                        </div>                    </th>                    <th>                        <div style="display: flex; align-items: baseline;"><span class="lnr lnr-clock"></span>                             Valor P                        </div>                    </th>                    <th></th>                </tr>            </tfoot>        </table>    </div></main><?phprequire "modals/billstopay.php";if (!isset($_SESSION['scripts'])):    $_SESSION['scripts'] = "        <script>            $(function () {             $('table.table-bordered').DataTable({                    language: {                        \"url\": \"__jsc/datatable/datatable.pt-br.json\"                    },                    responsive: true,                    processing: true,                    serverSide: true,                    ajax: {                        type: \"POST\",                        data: {                            Param: \"billstopay\"                        },                        url: \"../source/App/Table.php\"                    },                    deferRender: true,                    order: [[1, 'desc']],                    rowGroup: {                        dataSrc: 0                    },                    columnDefs: [                        {                            \"targets\": [0],                            \"visible\": false,                            \"searchable\": false,                            className: 'select-checkbox',                        },                        {                            targets: -1,                            orderable: false                        }                    ]                });            });        </script>    ";endif;//if (!isset($_SESSION['scripts']))://    $_SESSION['scripts'] = "//        <script>//            $(function () {//             $('table.table-bordered').DataTable({//                    language: {//                        \"url\": \"__jsc/datatable/datatable.pt-br.json\"//                    },//                    responsive: true,//                    processing: true,//                    serverSide: true,//                    ajax: {//                        type: \"POST\",//                        data: {//                            Param: \"billstoreceive\"//                        },//                        url: \"../source/App/Table.php\"//                    },//                    deferRender: true,//                    order: [[5, 'desc']],//                    rowGroup: {//                        dataSrc: 0//                    },//                    columnDefs: [//                        {//                            \"targets\": [0],//                            \"visible\": false,//                            \"searchable\": false//                        },//                        {//                            targets: -1,//                            orderable: false//                        }//                    ]//                });//            });//        </script>//    ";//endif;//if (!isset($_SESSION['scripts']))://    $_SESSION['scripts'] = "//    <script>//    $(function () {//        $('table.table-bordered').DataTable({//            language: {//                \"url\": \"__jsc/datatable/datatable.pt-br.json\"//            },//            responsive: true,//            processing: true,//            serverSide: true,//            ajax: {//                type: \"POST\",//                data: {//                    Param: \"billstoreceive\"//                },//                url: \"../source/App/Table.php\"//            },//            deferRender: true,//            order: [[0, 'desc']],//            columnDefs: [//                {//                    targets: -1,//                    orderable: false//                }//            ]//        });//    });//</script>//    ";//endif;