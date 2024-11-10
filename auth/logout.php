<?php

    session_start();      // in order to logout we need to start the session first
    session_unset();      // then we unset the session variables
    session_destroy();    // then we destroy the session

    header("location: http://localhost/restaurant");