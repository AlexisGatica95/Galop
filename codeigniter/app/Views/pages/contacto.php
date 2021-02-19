<div class="container">
<h1 class="titulo-principal"><?=ucfirst(lang("App.menu_contacto"))?></h1>
    <div class="form-container">
        <div class="contacto-left">
            <h3><?=ucfirst(lang("App.contacto.titulo"))?></h3>
            <hr>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim ad debitis nisi deserunt impedit. Sunt minima doloribus eum quidem dolorum sint, in aperiam tempora, aliquid earum suscipit. Non, minus recusandae.</p>
            <span class="mail"></span>
            <span class="tel"></span>
            <hr>
            <h3><?=ucfirst(lang("App.contacto.redes"))?></h3>
            <hr>
            <div class="redes">
                <img src="/img/facebook.png" alt="">
            </div>
        </div>

        <div class="contacto-right">
            <form action="" class="form-contacto">
            <label for="">
                <span><?=ucfirst(lang("App.contacto.form_nombre"))?></span>
                <input type="text" class="form-input">
            </label>
            <label for="">
                <span><?=ucfirst(lang("App.contacto.form_mail"))?></span>
                <input type="text" class="form-input">
            </label>
            <label for="">
                <span><?=ucfirst(lang("App.contacto.form_asunto"))?></span>
                <input type="text" class="form-input">
            </label>
            <label for="">
                <span><?=ucfirst(lang("App.contacto.form_mensaje"))?></span>
                <textarea cols="30" rows="10" class="form-input">
                </textarea>
            </label>
            <input type="submit" value="<?=ucfirst(lang("App.contacto.form_enviar"))?>" class="form-button">
            </form>
        </div>
        
    </div>
    
</div>
