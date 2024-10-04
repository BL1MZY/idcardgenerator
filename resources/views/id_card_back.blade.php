<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .imagePreview {
            width: 140px !important;
            height: 140px !important;
        }

        .id-card {
            font-family: serif, serif;
            border: 1px solid #cbcbcb;
        
          
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 10px;
            background-position: center center;
            background-size: contain;
            background-repeat: no-repeat;
            margin-bottom: 20px;
            page-break-inside: avoid;
        }

        .id-card-header {
            background-color: #DE1B21;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            font-size: 1.2em;
            border-bottom: 1px solid #cbcbcb;
        }

        .id-card-body {
            padding: 10px;
        }

        .id-card-photo {
            width: 120px;
            height: 120px;
            overflow: hidden;
            margin-right: 20px;
            float: left;
        }

        .id-card-photo img {
            width: 100%;
            height: 100%;
        }

        .id-card-info {
            margin-left: 140px; /* Width of photo + margin */
        }

        .id-card-info p {
            margin: 5px 0;
            font-size: .9rem;
        }

        .id-card-footer {
            background-color: #DE1B21;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-top: 1px solid #cbcbcb;
            font-weight: bold;
            margin-top: 28px;
            /* border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px; */
        }
        .flex{
            display: flex;
        }
    </style>
</head>
<body>
  
    
    <div class="id-card w-full md:w-[450px] md:h-[286px]" style="background-image: url({{ Auth::user()->status == 'Approved' ? asset('photo/lincoln.png') : asset('photo/notapproved.png') }}); padding: 0; height: 340px; width: 640px; ">
    
        <table style="width: 100%; padding: 10px;">
            <tr>
                <td style="width: 140px;">
                    <img src="{{ asset('photo/images.jpg') }}" width="180px" alt="">
                </td>
                <td style="text-align: right;">
                    <p class="red" style="margin: 0; color:#DE1B21; font-size:1.2rem">www.lincoln.edu.my</p>
                </td>
            </tr>
        </table>
        
        <div class="id-card-header">
            <h1 class="m-0" style="font-size: 1.8rem">{{ 'Disclaimer' }}</h1>
        </div>
    
        <div class="id-card-body">
            <div class="" style="margin-top: .4rem; text-align: center;">
                <p style="font-weight: 400; font-size: 1rem;">If found, please return this ID card to</p>
                <p style="font-weight: 400; font-size: 1rem;">123 University Ave, City, State, Zip Code</p>
                <p style="font-weight: 400; font-size: 1rem;">Phone: {{ $user->phone }}</p>
                <div style="margin-top: 8px;">
                    {{  QrCode::size(60)->generate(asset(Auth::user()->student_id)); }}
                </div>
            </div>
        </div>
    
        <div class="id-card-footer" style="padding: 1.4rem; text-align: center;">
            <p style="font-size: 1.1rem; margin: 0;">Email: support@lincoln.edu.my</p>
        </div>
    </div>
</body>
</html>