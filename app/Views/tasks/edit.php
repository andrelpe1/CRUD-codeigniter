<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Editar Tarefa</title>
</head>
<body>
    <div class="p-3 mb-2 bg-secondary text-body "><h1 class="text-center"> <i class="bi bi-pencil-fill"></i> Editar Tarefa</h1></div>
      <div class="container mt-2">
        <?php echo form_open('tasks/update'); ?>
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" value="<?php echo $task['title']; ?>"  class="form-control  <?php echo session('errors.title') ? 'is-invalid' : ''; ?>"
                   value="<?php echo old('title'); ?>">
                    <?php if (session('errors.title')) { ?>
                        <div class="invalid-feedback"><?php echo session('errors.title'); ?></div>
                    <?php } ?>
            </div>

             <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" value="<?php echo $task['description']; ?>" class="form-control <?php echo session('errors.description') ? 'is-invalid' : ''; ?>"
                   value="<?php echo old('description'); ?>">
                    <?php if (session('errors.description')) { ?>
                        <div class="invalid-feedback"><?php echo session('errors.description'); ?></div>
                    <?php } ?>
            </div>

             <div class="form-group input-group mb-3">
                <label class="input-group-text mt-3" for="status">Status</label>
                <select class="form-select mt-3" name="status" id="status" >
                    <option value="pendente" <?php echo ($task['status'] ?? '') === 'pendente' ? 'selected' : ''; ?>>pendente</option>
                    <option value="em andamento" <?php echo ($task['status'] ?? '') === 'em andamento' ? 'selected' : ''; ?>>em andamento</option>
                    <option value="concluída" <?php echo ($task['status'] ?? '') === 'concluída' ? 'selected' : ''; ?>>concluída</option>
                </select>
            </div>

            <input type="submit" value="alterar" class="btn btn-primary btn-lg">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>" >
        <?php echo form_close(); ?>
    </div>
</div>
</body>
</html>