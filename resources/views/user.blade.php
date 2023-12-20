<x-app-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Roboto;
        }

        .certificate-container {
            padding: 50px;
            width: 1024px;
        }

        .certificate {
            border: 20px solid #0C5280;
            padding: 25px;
            height: 600px;
            position: relative;
            border-radius: 36px
        }

        .certificate:after {
            content: '';
            top: 0px;
            left: 0px;
            bottom: 0px;
            right: 0px;
            position: absolute;
            background-image: url(https://image.ibb.co/ckrVv7/water_mark_logo.png);
            background-size: 100%;
            z-index: -1;
        }

        .certificate-header>.logo {
            width: 80px;
            height: 80px;
        }

        .certificate-title {
            text-align: center;
        }

        .certificate-body {
            text-align: center;
        }

        h1 {

            font-weight: 400;
            font-size: 48px;
            color: #0C5280;
        }

        .student-name {
            font-size: 24px;
        }

        .certificate-content {
            margin: 0 auto;
            width: 750px;
        }

        .about-certificate {
            width: 380px;
            margin: 0 auto;
        }

        .topic-description {

            text-align: center;
        }

        #header {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .flex {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            position: relative;
        }

        .btn-download {
            display: inline-block;
            text-decoration: none;
            background-color: salmon;
            color: #FAFAFA;
            padding: 10px 62px;
            margin: 10px auto;
        }

        .btn-download:hover {
            opacity: 0.8;
        }

        .btn i {
            margin-right: 5px;
        }

        #banner {
            width: 100%;
            height: 131px;
            /* Adjust this value to your needs */
            overflow: hidden;
            position: relative;
        }

        #image-container {
            width: 100%;
            height: 100%;
            margin-top: 15px;
        }

        .banner-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 18px;
        }

        .banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black;
    font-size: 42px;
    font-weight: normal;
}
    </style>
    <div id="banner">
        <div id="image-container">
            {{-- <img  alt="" class="banner-image"> --}}
            <div class="banner-text">Welcome User</div>
        </div>
    </div>


    <div class="py-12" id="demo" style="
                 background-color: #ffffff57;
                 padding-top: 1rem;
                 padding-bottom: 1rem;
                ">
  
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div style="display: flex;flex-direction: row;justify-content: center;" id="block1">
                        <div class="certificate-container">
                            <div class="certificate">
                                <div id="header">
                                    <h1>Certificate </h1>


                                </div>
                                <div
                                    style="
                                     display: flex;
                                            align-items: center;
                                            justify-content: space-between;
                                        ">
                                    <div style="align-self: flex-start;">
                                        {!! QrCode::size(100)->generate("http://localhost:8000/qr_content?token=$token") !!}
                                    </div>
                                    <div>
                                        <img src="{{ URL::asset('/images/logo.png') }}" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="water-mark-overlay"></div>
                                <div style="display: flex;">

                                    <div class="certificate-body">
                                        <p class="student-name">{{ $user->name }}</p>
                                        <p class="certificate-title"><strong>RENR NCLEX AND CONTINUING EDUCATION (CME)
                                                Review
                                                Masters</strong>
                                        </p>


                                        <div class="certificate-content">
                                            <div class="about-certificate">
                                                <p>

                                                </p>
                                            </div>
                                            <p class="topic-title">
                                                Congratulations you are registered Successfully!
                                            </p>
                                            <div class="text-center">
                                                <p class="topic-description text-muted">You are a Authorized User to
                                                    Acces the website.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="certificate-footer text-muted">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Authorized By: Nilesh Bhardwaj</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>
                                                                Accredited by
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>
                                                                Endorsed by
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <a href="javascript:void(0)" class="btn btn-download">
                        <i class="fa fa-download"></i> Download
                    </a>
                </div>
            </div>
          
        </div>
        

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"
        integrity="sha512-pdCVFUWsxl1A4g0uV6fyJ3nrnTGeWnZN2Tl/56j45UvZ1OMdm9CIbctuIHj+yBIRTUUyv6I9+OivXj4i0LPEYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const options = {
            margin: 0.3,
            filename: 'filename.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 3
            },
            jsPDF: {
                unit: 'in',
                format: 'a3',
                orientation: 'portrait'
            }
        }

        var objstr = document.getElementById('block1').innerHTML;

        var strr = '<html><head><title>Testing</title>';
        strr += '</head><body>';
        strr += '<div style="border:0.1rem solid #ccc!important;padding:0.5rem 1.5rem 0.5rem 1.5rem;margin-top:1.5rem">' +
            objstr + '</div>';
        strr += '</body></html>';

        $('.btn-download').click(function(e) {
            e.preventDefault();
            var element = document.getElementById('demo');
            //html2pdf().from(element).set(options).save();
            //html2pdf(element);
            html2pdf().from(strr).set(options).save();
        });
    </script>
</x-app-layout>
