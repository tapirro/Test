 <center>
 <form name="loginform" id="loginform" action="/usr/login" method="post">
            <div style="width: 130px;">
                <label>email<br />

                <input type="text" name="login[login]" id="user_login" class="input" value="" size="20" tabindex="10" style="width: 80%;"/></label>
            </div>
             <div style="width: 130px;">   
                <label>пароль<br />
                <input type="password" name="login[pass]" id="user_pass" class="input" value="" size="20" tabindex="20" style="width: 80%;"/></label>
            </div>
            <div style="width: 130px;" class="submit">

                <input type="submit" name="wp-submit" id="wp-submit" value="войти" tabindex="100" />
                <input type="hidden" name="redirect_to" value="/" />
                <input type="hidden" name="testcookie" value="1" />
            </div>
        </form>
</center>