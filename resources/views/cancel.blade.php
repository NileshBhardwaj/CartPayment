<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,700,600);

    .container {
        padding: 20px;
    }

    body {
        background-color: #f6f4f4;
        font-family: 'Raleway', sans-serif;
        align-content: center
    }
</style>
<div id="main" style="
    width: 101%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    margin-top: 85px;
">
    <div class="container">
        <div class="ui middle aligned center aligned grid">
            <div class="ui eight wide column">

                <form class="ui large form">

                    <div class="ui icon negative message" style="
                display: flex;
                flex-direction: row;
                justify-content: center;
                font-size: 23px;
                background-color: #ff000052;
                border-radius: 2px;
            ">
                        <i class="warning icon"></i>
                        <div class="content">
                            <div class="header" style="
                display: flex;
                flex-direction: row;
                justify-content: center;
            ">
                                <i class="fas fa-exclamation-triangle"></i>
                                Oops! Something went wrong.
                            </div>
                            <p>While trying to reserve money from your account</p>
                        </div>

                    </div>
                    <div style="
                font-size: 20px;
                display: flex;
                flex-direction: row;
                justify-content: center;
                margin-top: 23px;
                /* height: 26px; */
                background-color: #ebeb1326;
            ">
                        <i class="fa fa-repeat" aria-hidden="true"></i><a href="http://127.0.0.1:8000/cart"><span
                                class="ui large teal submit fluid button">Try
                                again</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>