
   <!-- Footer starts here -->
   <footer class="footer">
    <div class="footer-container">
      <div class="footer-form">
        <h4> Our Newsletter</h4>
        <form action="">
          <input type="email" placeholder="Enter your email">
          <button class="btn-4 btn-box">subscribe</button>
        </form>
      </div>
      <div class="footer-content">
        <div class="footer-columns">
          <div class="column-1">
            <h6>
              About Energym
            </h6>
            <p>
              consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
              minim veniam, quis nostrud exercitation u
            </p>
          </div>
          <div class="column-2">
            <h6>
              Menus
            </h6>
            <ul>
              <li class=" active">
                <a class="" href="index.php">Home</a>
              </li>
              <li class="">
                <a class="" href="#about">About </a>
              </li>
              <li class="">
                <a class="" href="#services">Services </a>
              </li>
              <li class="">
                <a class="" href="#memberships">Memberships </a>
              </li>              
              <li class="">
                <a class="" href="#personal_trainers">Memberships </a>
              </li>              
              <li class="">
                <a class="" href="#contact">Contact Us</a>
              </li>
              <li class="">
                <a class="" href="#">Login</a>
              </li>
            </ul>
          </div>
          <div class="column-3">
            <h6>
              Useful Links
            </h6>
            <ul>
              <li>
                <a href="">
                  Adipiscing
                </a>
              </li>
              <li>
                <a href="">
                  Elit, sed
                </a>
              </li>
              <li>
                <a href="">
                  do Eiusmod
                </a>
              </li>
              <li>
                <a href="">
                  Tempor
                </a>
              </li>
              <li>
                <a href="">
                  incididunt
                </a>
              </li>
            </ul>
          </div>
          <div class="column-4">
            <h6>
              Contact Us
            </h6>
            <div class="info_link-box">
              <div>
                <a href="">
                  <img src="images/location-white.png" alt="">
                  <p> No.123, loram ipusm</p>
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/call-white.png" alt="">
                  <p>+383 44 123456</p>
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/mail-white.png" alt="">
                  <p> powergym@gmail.com</p>
                </a>
              </div>
            </div>
            <div class="info_social">
              <div>
                <a href="">
                  <img src="images/facebook-logo-button.png" alt="">
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/twitter-logo-button.png" alt="">
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/linkedin.png" alt="">
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/instagram.png" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
   </footer>
  </body>
  <!-- <script src="slick.min.js"></script> -->
  <script src="jquery-3.6.0.js"></script>  
  <script src="slick.min.js"></script>  
  <script src="jquery.validate.min.js"></script>
  <script>
    $().ready(function() {
        $("#login").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                email: {
                    required: "Please provide an email",
                    email: "Please enter a valid email address"
                }
            }
        });
        $("#register").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                lastname: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                telephone: {
                    required: true
                },
                membership: {
                  required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                joiningdate: {
                  required: true
                }
            },
            messages: {
                firstname: {
                    required: "Ju lutem shenoni emrin",
                    minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Emri nuk duhet te kete numra "
                },
                lastname: {
                    required: "Ju lutem shenoni mbiemrin",
                    minlength: "Mbiemri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Mbiemri nuk duhet te kete numra "
                },
                telephone: {
                  required: "Ju lutem shenoni telefonin"
                },
                membership: {
                  required: "Please choose a membership type"
                },
                email: {
                    required: "Ju lutem shenoni emailin",
                    email: "Ju lutem shenoni emaili adres valide"
                },
                password: {
                    required: "Ju lutem shenoni fjalekalimin",
                    minlength: "Fjalekalimi i juaj duhet te kete se paku gjashte karaktere"
                },
                joiningdate: {
                  required: "Please select a date"
                }

            }
        });
        $("#payment").validate({
            rules: {
              accountnr: {
                required: true,
                minlength: 16,
                numbersonly: true
              },
              expirydate: {
                required: true
              },
              securitynr: {
                required: true,
                minlength: 3,
                numbersonly: true
              }
            },
            messages: {
              accountnr: {
                required: "Please write an account number",
                minlength: "Must contain 16 numbers",
                numbersonly: "Must contain only numbers"
              },
              expirydate: {
                required: "Please write expiry date of your account"
              },
              securitynr: {
                required: "Please write security number of your account",
                minlength: "Must contain 3 numbers",
                numbersonly: "Must contain only numbers"
              }
            }

        });
        $("#m-profile").validate({
            rules: {
              telephone: {
                required: true,
                numbersonly: true
              },
              email: {
                required: true,
                email: true
              },
              password: {
                required: true,
                minlength: 5
              }
            },
            messages: {
              telephone: {
                    required: "Ju lutem shenoni telefonin",
                    numbersonly: "Numri telefonit nuk duhet te kete shkronja"
              },
              email: {
                    required: "Ju lutem shenoni emailin",
                    email: "Ju lutem shenoni email adres valide"
                },
                password: {
                    required: "Ju lutem shenoni fjalekalimin",
                    minlength: "Fjalekalimi i juaj duhet te kete se paku gjashte karaktere"
                }
            }
        });
        $("#ch-membership").validate({
          rules: {
              membership: {
                required: true
              },
              joiningdate: {
                required: true
              }
            },
            messages: {
              membership: {
                required: "Please choose a membership type"
              },
              joiningdate: {
                required: "Please select a date"
              }
            }

        });
        $("#first").validate({
          rules: {
              membership: {
                required: true
              }
            },
            messages: {
              membership: {
                required: "Please choose a membership type"
              }
            }
        }); 
        $("#second").validate({
          rules: {
              membership: {
                required: true
              }
            },
            messages: {
              membership: {
                required: "Please choose a membership type"
              }
            }
        });
        $("#third").validate({
          rules: {
              searchdate: {
                required: true
              }
            },
            messages: {
              searchdate: {
                required: "Please choose a date"
              }
            }
        });
        $("#t-profile").validate({
            rules: {
              firstname: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
              },
              lastname: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
              },
              telephone: {
                required: true,
                numbersonly: true
              },
              email: {
                required: true,
                email: true
              },
              password: {
                required: true,
                minlength: 5
              }
            },
            messages: {
              firstname: {
                    required: "Ju lutem shenoni emrin",
                    minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Emri nuk duhet te kete numra "
                },
                lastname: {
                    required: "Ju lutem shenoni mbiemrin",
                    minlength: "Mbiemri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Mbiemri nuk duhet te kete numra "
                },
              telephone: {
                    required: "Ju lutem shenoni telefonin",
                    numbersonly: "Numri telefonit nuk duhet te kete shkronja"
              },
              email: {
                    required: "Ju lutem shenoni emailin",
                    email: "Ju lutem shenoni email adres valide"
                },
                password: {
                    required: "Ju lutem shenoni fjalekalimin",
                    minlength: "Fjalekalimi i juaj duhet te kete se paku gjashte karaktere"
                }
            }
        });
        $("#workout").validate({
            rules: {
                workoutname: {
                    required: true
                },
                workoutdescription: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                workoutname: {
                    required: "Please provide a workout name"
                },
                workoutdescription: {
                    required: "Please provide a workout description"
                }
            }
        });
        $("#plan").validate({
          rules: {
              workoutdate: {
                required: true
              },
              starttime: {
                required: true
              },
              endtime: {
                required: true
              },
              workouts: {
                required: true
              }
            },
            messages: {
              workoutdate: {
                required: "Please choose a date"
              },
              starttime: {
                required: "Please choose a start time"
              },
              endtime: {
                required: "Please choose an end time"
              },
              workouts: {
                required: "Please choose a workout"
              }
            }
        });
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");
        jQuery.validator.addMethod("numbersonly", function(value, element) {
            return this.optional(element) || /^[0-9]+$/i.test(value);
        }, "Numbers only please");
    });
    $('.autoplay').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false
    });
    $('#logout').click(function(){
        $.ajax({
            url: './inc/functions.php?argument=logout',
            success: function(data) {
                window.location.href = data;
            }
        });
    });
    $('#message').fadeOut(8000,function(){
        $.ajax({
            url: './inc/functions.php?argument=message'
        });
    });
    $('#sh-login').click(function(){
      $('#sh-register').fadeOut();
    });
    $('#sh-register').click(function(){
      $('#sh-login').fadeOut();
    });
  </script>


</html>
