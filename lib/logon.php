<?php
/**
 * Created by IntelliJ IDEA.
 * User: serrin
 * Date: 4/17/17
 * Time: 1:40 PM
 */
?>
<div class="row">
                                <div class ="col-md-12">
                                    <form class="form" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" accept-charset="UTF-8" id="login-nav">
                                        <input type="hidden" name="logon" />

                                        <div class="form-group">

                                            <label class="sr-only" for="email">Email address</label>
                                            <input class="form-control" id="email" placeholder="Username or email" />
                                        </div>

                                        <div class="form-group">

                                            <label class="sr-only" for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" />
                                            <div class="help-block text-right"><a href="">Forget the password ?</a></div>

                                        </div>
                                        <div class="form-group">

                                            <button type="submit" class="btn btn-success btn-block">Sign in</button>

                                        </div>
                                        <div class="form-group">

                                            <button type="Reset" class="btn btn-danger btn-block">reset</button>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Remember me
</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
