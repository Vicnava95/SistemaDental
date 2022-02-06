<div class="modal-dialog" role="document">
    <div class="modal-content bg-dark">
        <div class="modal-header">
            <h5 class="modal-title text-white" id="exampleModalLabel">Elementos base para el formulario</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="get">

                <h2>Login</h2>

                <div class="form-group">
                    <div class="input-icon">
                        <span class="input-icon-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email2">Email Address</label>
                    <input type="email" class="form-control" id="email2" placeholder="Enter Email">
                    <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>

                <h2>Inputs</h2>

                <div class="form-group">
                    <label class="control-label">
                        Static
                    </label> 
                    <p class="form-control-static">hello@example.com</p> 
                </div>

                <div class="form-group">
                    <label for="disableinput">Disable Input</label>
                    <input type="text" class="form-control" id="disableinput" placeholder="Enter Input" disabled="">
                </div>

                <div class="form-group">
                    <label for="largeInput">Default Input</label>
                    <input type="text" class="form-control form-control" id="defaultInput" placeholder="Default Input">
                </div>

                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="comment" rows="5">
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="largeInput">Money</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>

                <div class="form-check">
                    <label>Gender</label><br>
                    <label class="form-radio-label">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                        <span class="form-radio-sign">Male</span>
                    </label>
                    <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                        <span class="form-radio-sign">Female</span>
                    </label>
                </div>
                
                <div class="form-group">
                    <label class="form-label d-block">Icon input</label>
                    <div class="selectgroup selectgroup-secondary selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="1" class="selectgroup-input" checked="">
                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-sun"></i></span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="2" class="selectgroup-input">
                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-moon"></i></span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="3" class="selectgroup-input">
                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-tint"></i></span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="4" class="selectgroup-input">
                            <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-cloud"></i></span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="defaultSelect">Default Select</label>
                    <select class="form-control form-control" id="defaultSelect">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Size</label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="value" value="50" class="selectgroup-input" checked="">
                            <span class="selectgroup-button">S</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="value" value="100" class="selectgroup-input">
                            <span class="selectgroup-button">M</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="value" value="150" class="selectgroup-input">
                            <span class="selectgroup-button">L</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="value" value="200" class="selectgroup-input">
                            <span class="selectgroup-button">XL</span>
                        </label>
                    </div>
                </div>

                

                <div class="form-group">
                    <label class="form-label">Your skills</label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="checkbox" name="value" value="HTML" class="selectgroup-input" checked="">
                            <span class="selectgroup-button">HTML</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="value" value="CSS" class="selectgroup-input">
                            <span class="selectgroup-button">CSS</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="value" value="PHP" class="selectgroup-input">
                            <span class="selectgroup-button">PHP</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="value" value="JavaScript" class="selectgroup-input">
                            <span class="selectgroup-button">JavaScript</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="value" value="Ruby" class="selectgroup-input">
                            <span class="selectgroup-button">Ruby</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="value" value="Ruby" class="selectgroup-input">
                            <span class="selectgroup-button">Ruby</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="checkbox" name="value" value="C++" class="selectgroup-input">
                            <span class="selectgroup-button">C++</span>
                        </label>
                    </div>
                </div>

                <h2>Selector de imagenes para los dientes :v</h2>
                <div class="form-group">
                    <label class="form-label">Image Check</label>
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <label class="imagecheck mb-4">
                                <input name="imagecheck" type="checkbox" value="1" class="imagecheck-input">
                                <figure class="imagecheck-figure">
                                    <img src="../../assets/img/examples/product1.jpg" alt="title" class="imagecheck-image">
                                </figure>
                            </label>
                        </div>
                        <div class="col-6 col-sm-4">
                            <label class="imagecheck mb-4">
                                <input name="imagecheck" type="checkbox" value="2" class="imagecheck-input" checked="">
                                <figure class="imagecheck-figure">
                                    <img src="../../assets/img/examples/product4.jpg" alt="title" class="imagecheck-image">
                                </figure>
                            </label>
                        </div>
                        <div class="col-6 col-sm-4">
                            <label class="imagecheck mb-4">
                                <input name="imagecheck" type="checkbox" value="3" class="imagecheck-input">
                                <figure class="imagecheck-figure">
                                    <img src="../../assets/img/examples/product3.jpg" alt="title" class="imagecheck-image">
                                </figure>
                            </label>
                        </div>
                    </div>
                </div>
                <h2> DATE and time</h2>
                <!-- Fecha -->
                <div class="form-group">
                    <div class="input-group date" >
                        <input type="text" class="form-control" id="datetimepicker">
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $("#datetimepicker").datetimepicker({
                            format: 'YYYY/MM/DD',
                        });    
                    });
                 </script>

                <!--Hora-->

                <div class="form-group">
                    <div class="input-group date" >
                    <input type="text" class="form-control" id="datetimepicker3"/>
                    <span class="input-group-addon input-group-prepend">
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                        </div>
                    </div>
                </div>
                
                 <script type="text/javascript">
                    $(function () {
                        $("#datetimepicker3").datetimepicker({
                            format: 'HH:mm',
                        });
                    });
                 </script>
                
                 <!-- Fechas enlazadas -->
                 <div class="form-group">
                    <div class='input-group date'>
                       <input type='text' class="form-control" id='datetimepicker6'/>
                       <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <div class='input-group date'>
                       <input type='text' class="form-control" id='datetimepicker7'/>
                       <div class="input-group-addon input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                 </div>
                 <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker6').datetimepicker({
                            format: 'YYYY/MM/DD',
                        });
                        $('#datetimepicker7').datetimepicker({
                            useCurrent: false,
                            format: 'YYYY/MM/DD', //Important! See issue #1075
                    });
                        $("#datetimepicker6").on("dp.change", function (e) {
                            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                        });
                        $("#datetimepicker7").on("dp.change", function (e) {
                            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                        });
                    });
                 </script>

                <h2>Botones</h2>
                <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                    <button class="btn btn-danger">Cancel</button>
                </div>
            </form>
        </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
    </div>
</div>