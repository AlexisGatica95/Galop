<script src="https://www.google.com/recaptcha/api.js?render=<?=getenv('captcha.sitekey')?>"></script>
<div class="container">
<h1 class="titulo-principal"><?=ucfirst(lang("App.contacto.contacto"))?></h1>
    <?php if (session()->get('success')): ?>
    <div class="success notification">
        <?= session()->get('success') ?>
    </div>
    <?php endif ?>
    <?php if (session()->get('error')): ?>
    <div class="error notification">
        <?= session()->get('error') ?>
    </div>
    <?php endif ?>
    <div class="form-container">
        <div class="contacto-left">
            <h3><?=ucfirst(lang("App.contacto.titulo"))?></h3>
            <hr>
            <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim ad debitis nisi deserunt impedit. Sunt minima doloribus eum quidem dolorum sint, in aperiam tempora, aliquid earum suscipit. Non, minus recusandae.</p> -->
            <span class="mail"></span>
            <span class="tel"></span>
            <!-- <hr>
            <h3><?php # ucfirst(lang("App.contacto.redes"))?></h3>
            <hr>
            <div class="redes">
                <img src="/img/facebook.png" alt="">
            </div> -->
        </div>
        <div class="contacto-right">
            <form action="" class="form-contacto" id="form-contacto" method="post">
            <label for="nombre">
                <span><?=ucfirst(lang("App.contacto.form_nombre"))?></span>
                <input type="text" class="form-input" name="nombre">
            </label>
            <label for="email">
                <span><?=ucfirst(lang("App.contacto.form_mail"))?></span>
                <input type="email" class="form-input" name="email">
            </label>
            <label for="subject">
                <span><?=ucfirst(lang("App.contacto.form_asunto"))?></span>
                <input type="text" class="form-input" name="subject">
            </label>
            <label for="mensaje">
                <span><?=ucfirst(lang("App.contacto.form_mensaje"))?></span>
                <textarea cols="30" rows="10" class="form-input" name="mensaje">
                </textarea>
            </label>
            <input type="submit" value="<?=ucfirst(lang("App.contacto.form_enviar"))?>" class="form-button">
            </form>
        </div>
    </div>
</div>