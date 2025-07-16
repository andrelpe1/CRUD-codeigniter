<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Criar Tarefa</title>
</head>
<body>
     <div class="p-3  bg-secondary "><h1 class="text-center"></i><i class="bi bi-clipboard2-plus"></i> Criar Tarefa</h1></div>
    <div class="container mt-3">
        <?php echo form_open('tasks/store'); ?>
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title"  class="form-control <?php echo session('errors.title') ? 'is-invalid' : ''; ?>"
                   value="<?php echo old('title'); ?>">
                    <?php if (session('errors.title')) { ?>
                        <div class="invalid-feedback"><?php echo session('errors.title'); ?></div>
                    <?php } ?>
                
            </div>
             <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" class="form-control <?php echo session('errors.description') ? 'is-invalid' : ''; ?>"
                   value="<?php echo old('description'); ?>">
                    <?php if (session('errors.description')) { ?>
                        <div class="invalid-feedback"><?php echo session('errors.description'); ?></div>
                    <?php } ?>
            </div>
             <div class="form-group input-group mb-3">
                <label class="input-group-text mt-3" for="status">Status</label>
                <select class="form-select mt-3" name="status" id="status">
                    <option value="pendente">pendente</option>
                    <option value="em andamento">em andamento</option>
                    <option value="concluída">concluída</option>
                </select>
            </div>
            <input type="submit" value="adicionar" class="btn btn-primary btn-lg">
        <?php echo form_close(); ?>
    </div>
</body>
</html>