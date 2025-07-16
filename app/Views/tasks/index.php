<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Tarefas</title>

    <script>
        function confirma(){
            if(!confirm("Deseja excluir o registro?")){
                return false;
            }
            return true;
        }
    </script>

</head>

<body>
    <div class="p-3 mb-2 bg-body-secondary">
      <?php if (isset($_GET['alert']) && $_GET['alert'] == 'sucessCreate') {  ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true"></button>
                            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
                            Tarefa criada com sucesso!
                        </div>
                      </div>
                </div>
          <?php } ?>
        <?php if (isset($_GET['alert']) && $_GET['alert'] == 'sucessUpdate') {  ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary alert-dismissible">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true" aria-label="close"></button>
                            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
                            Tarefa atualizada com sucesso!
                        </div>
                      </div>
                </div>
          <?php } ?>
          <?php if (isset($_GET['alert']) && $_GET['alert'] == 'sucessDelete') {  ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true" aria-label="close"></button>
                            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
                            Tarefa excluída com sucesso!
                        </div>
                      </div>
                </div>
          <?php } ?>
           <?php if (isset($_GET['alert']) && $_GET['alert'] == 'errorDelete') {  ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true" aria-label="close"></button>
                            <h5><i class="icon fas fa-check"></i> ERRO!</h5>
                            Não foi possível excluir a tarefa!
                        </div>
                      </div>
                </div>
          <?php } ?>
           <?php if (isset($_GET['alert']) && $_GET['alert'] == 'errorCreate') {  ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true" aria-label="close"></button>
                            <h5><i class="icon fas fa-check"></i> ERRO!</h5>
                            Não foi possível criar a tarefa!
                        </div>
                      </div>
                </div>
          <?php } ?>
           <?php if (isset($_GET['alert']) && $_GET['alert'] == 'errorUpdate') {  ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true" aria-label="close"></button>
                            <h5><i class="icon fas fa-check"></i> ERRO!</h5>
                            Não foi possível atualizar a tarefa!
                        </div>
                      </div>
                </div>
          <?php } ?>


    <div class="p-3 mb-2 bg-body text-body rounded"><h1 class="text-center">Tarefas</h1></div>
            

    <div class="container mt-2 card-body ">
        <?php echo anchor(base_url('tasks/create/'), '<i class="bi bi-plus-square-fill"></i> Nova Tarefa', ['escape' => false, 'class' => 'btn btn-success mb-4 ']); ?>
        <table class="table table-striped table-bordered">
           <thead>
                 <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>STATUS</th>
                    <th>AÇÕES</th>
                 </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) { ?>
                    <tr>
                        <td><?php echo $task['id']; ?></td>
                        <td><?php echo $task['title']; ?></td>
                        <td><?php echo $task['description']; ?></td>
                        <td><?php echo $task['status']; ?></td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <?php echo anchor('tasks/edit/'.$task['id'], '<i class="bi bi-pencil-square"></i> Editar', ['escape' => false, 'class' => 'btn btn-warning']); ?>
                                <?php echo anchor('tasks/delete/'.$task['id'], '<i class="bi bi-trash-fill"></i> Excluir', ['onclick' => 'return confirma()', 'escape' => false, 'class' => 'btn btn-danger']); ?> 
                            </div>
                        </td>
                    </tr>
                <?php } ?>
             </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            <?php echo $pager->links('default', 'bootstrap_pagination'); ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>