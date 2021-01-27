<div class="card m-auto" style="height: 30rem; width: 25rem;">
    <div class="card-header d-flex justify-content-center align-items-center">
        <img class="card-img-top" style="width: 50px; height: 50px;" src="../../assets/img/logo.png" alt="Imagem">
        <h3 class="card-title">Task Manager</h3>
    </div>
    
    <div class="card-body">
        <form method="post" action="index.php?route=login">
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço de email</label>
                <input type="email" class="form-control <?php echo $have_error && ($list_errors['email_empty'] || $list_errors['invalid_login']) ? 'is-invalid' : ''?>" id="email" name="email" value="<?= $user->getEmail();?>" aria-describedby="emailHelp" placeholder="Seu email">
                <?php
                    if($have_error && array_key_exists('email_empty', $list_errors)){ ?>
                        <small class="invalid-feedback"><?=$list_errors['email_empty'];?></small>
                <?php    
                     }
                ?>  
                <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
            </div>    

           <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control <?php echo $have_error && ($list_errors['password_empty']  || $list_errors['invalid_login']) ? 'is-invalid' : ''?>" id="password" name="password" value="<?= $user->getPassword();?>" placeholder="Senha">
                <?php
                    if($have_error && array_key_exists('password_empty', $list_errors)){ ?>
                        <small class="invalid-feedback"><?=$list_errors['password_empty'];?></small>
                <?php    
                     }

                    if($have_error && array_key_exists('invalid_login', $list_errors)){ ?>
                        <small class="invalid-feedback"><?=$list_errors['invalid_login'];?></small>
                <?php
                    }        
                ?>  
            </div>
           

            <div class="form-group">
                <a href="">Crie a sua conta</a>
            </div>

            <div class="form-group" style="text-align: right;">
                <button class="btn btn-primary" type="submit">Entrar</button>
            </div>
        </form>
    </div>
</div>