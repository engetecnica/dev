<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                       
                        <a href="<?php echo base_url('fornecedor/adicionar'); ?>">
                        <button class="au-btn au-btn-icon au-btn--blue">
                        <i class="zmdi zmdi-plus"></i>Adicionar</button></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">Fornecedores</h2>
                    <div class="table-responsive table--no-card m-b-40">
                        <table 
                            class="table table-borderless table-striped table-earning" 
                            id="fornecedor_index"
                        ></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
<script>
    const data_table_columns = [
        {
            title: 'ID',
            name: 'id_fornecedor',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.id_link
            }
        },
        { 
            title: 'Razão Social' ,
            name: 'razao_social',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.razao_social_link
            }
        },
        { 
            title: 'CNPJ' ,
            name: 'cnpj',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.cnpj
            }
        },
        { 
            title: 'Responsável' ,
            name: 'responsavel',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.responsavel
            }
        },
        { 
            title: 'Email' ,
            name: 'responsavel_email',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.responsavel_email
            }
        },
        { 
            title: 'Celular' ,
            name: 'responsavel_celular',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.responsavel_celular
            }
        },
        { 
            title: 'Situação',
            sortable: true,
            searchable: true,
            name: 'situacao',
            render: function(value, type, row, settings){
                return row.situacao_html
            }
        },
        { 
            title: 'Gerenciar' ,
            render(value, type, row, settings){
                return row.actions
            },
        },
    ]

    const options = {
        columns: data_table_columns,
        url: `fornecedor`,
        method: 'post',
        order: [1, 'desc'],
    }

    $(window).ready(() => loadDataTable('fornecedor_index', options))
    $(window).resize(() => loadDataTable('fornecedor_index', options))
</script>
