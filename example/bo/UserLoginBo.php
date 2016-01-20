<?php
interface UserLoginBo{
    public function islogin(User $user);
    public function loginout();
}
