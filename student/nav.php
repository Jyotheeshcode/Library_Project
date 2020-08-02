
<nav class="main-menu">
      <div class="settings">
        <a class="nav-link p-0" href="#">
          <img
            src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg"
            class="rounded-circle z-depth-0"
            alt="avatar image"
            height="35"
          />
        </a>
        <p><?php echo $name ?></p>
      </div>

      <ul>
        <li>
          <a href="index.php">
            <i class="fa fa-tachometer fa-lg nav-logo"></i>
            <span class="nav-text">Dashbord</span>
          </a>
        </li>

        <li>
          <a href="message.php">
            <i class="fa fa-comment-o fa-lg nav-logo"></i>
            <span class="nav-text">Messages</span>
          </a>
        </li>

        <!-- <li>
          <a href="http://startific.com">
            <i class="fa fa-heart-o fa-lg"></i>
            <span class="share">
              <div style="position:absolute;margin-left: 56px;top:3px;">
                <a
                  href="https://www.facebook.com/sharer/sharer.php?u="
                  target="_blank"
                  class="share-popup"
                  ><img
                    src="http://icons.iconarchive.com/icons/danleech/simple/512/facebook-icon.png"
                    width="30px"
                    height="30px"
                /></a>
                <a
                  href="https://twitter.com/share"
                  target="_blank"
                  class="share-popup"
                  ><img
                    src="https://cdn1.iconfinder.com/data/icons/metro-ui-dock-icon-set--icons-by-dakirby/512/Twitter_alt.png"
                    width="30px"
                    height="30px"
                /></a>
                <a
                  href="https://plusone.google.com/_/+1/confirm?hl=en&url=_URL_&title=_TITLE_"
                  target="_blank"
                  class="share-popup"
                  ><img
                    src="http://icons.iconarchive.com/icons/danleech/simple/512/google-plus-icon.png"
                    width="30px"
                    height="30px"
                /></a>
              </div>
              <script type="text/javascript">
                var addthis_config = { data_track_addressbar: true };
              </script>
              <script
                type="text/javascript"
                src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4ff17589278d8b3a"
              ></script>
            </span>
            <span class="twitter"></span>
            <span class="google"></span>
            <span class="fb-like">
              <iframe
                src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2Fstartific&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35"
                scrolling="no"
                frameborder="0"
                style="border:none; overflow:hidden; height:35px;"
                allowTransparency="true"
              ></iframe>
            </span>
            <span class="nav-text"></span>
          </a>
        </li> -->

        <li class="darkerlishadow">
          <a href="book.php">
            <i class="fa fa-book fa-lg nav-logo"></i>
            <span class="nav-text">All Books</span>
          </a>
        </li>

        <li class="darkerli">
          <a href="history.php">
            <i class="fa fa-list fa-lg nav-logo"></i>
            <span class="nav-text">Borrowed History</span>
          </a>
        </li>

        <li class="darkerli">
          <a href="recommendations.php">
            <i class="fa fa-list nav-logo"></i>
            <span class="nav-text">Recommend Books</span>
          </a>
        </li>

        <li class="darkerli">
          <a href="current.php">
            <i class="fa fa-check fa-lg nav-logo"></i>
            <span class="nav-text">Currently Issued Books</span>
          </a>
        </li>
      </ul>
      <ul class="logout">
        <li>
          <a href="logout.php">
            <i class="fa fa-sign-out fa-lg nav-logo"></i>
            <span class="nav-text">Log Out</span>
          </a>
        </li>
      </ul>
    </nav>