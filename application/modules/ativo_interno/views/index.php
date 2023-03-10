<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <?php if($this->permitido($permissoes, 10, 'adicionar')){ ?>
                            <a href="<?php echo base_url('ativo_interno/adicionar'); ?>">
                            <button class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>Adicionar</button></a>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">Ativo Interno</h2>
                    <div class="table-responsive table--no-card m-b-40">
                        <table 
                            class="table table-borderless table-striped table-earning" 
                            id="ativo_interno_index"
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
            title: 'Patrimônio',
            name: 'codigo_patrimonio',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.patrimonio_html
            }
        },
        {
            title: 'Número De Série',
            name: 'serie',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.serie_link
            }
        },
        { 
            title: 'Título' ,
            name: 'nome',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.nome_link
            }
        },
        { 
            title: 'Marca' ,
            name: 'marca',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.marca
            }
        },
        { 
            title: 'Valor Atribuído' ,
            name: 'valor',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.valor
            }
        },
        { 
            title: 'Quantidade' ,
            name: 'quantidade',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.quantidade
            }
        },
        { 
            title: 'Inclusão' ,
            name: 'data_inclusao',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.data_inclusao
            }
        },
        { 
            title: 'Descarte' ,
            name: 'data_descarte',
            sortable: true,
            searchable: true,
            render: function(value, type, row, settings){
                return row.data_descarte
            }
        },
        { 
            title: 'Situação',
            sortable: true,
            searchable: true,
            name: 'ativo_interno.situacao',
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
        url: `ativo_interno`,
        method: 'post',
        order: [1, 'desc'],
    }

    $(window).ready(() => loadDataTable('ativo_interno_index', options))
    $(window).resize(() => loadDataTable('ativo_interno_index', options))
</script>
