@php
    $name = "Ramoncito T. Valdez Jr.";
    $photo = "pic.jpeg";
    $phone = "0977-097-3774";
    $linkedin = "https://www.linkedin.com/in/ramoncito-valdez-0894ba2b9/";
    $github = "https://github.com/Valdez-Ramoncito/IT-3A-Websys-2";
    $email = "22ur0754@psu.edu.ph";
    $address = "Zone 4 Brgy. Barangobong, Tayug, Pangasinan";
    $dob = "July 5, 2002";
    $gender = "Male";
    $age = 24;
    $nationality = "Filipino";
    $profession = "College Undegraduate";
    $objective = "To become an aspiring Information Technology Majoring in Web and Mobile Technologies.";
    $education = [
        ['year' => '2010-2015', 'degree' => 'Elementary', 'institution' => 'Rosa L Susano Elementary School'],
        ['year' => '2015-2019', 'degree' => 'High School', 'institution' => 'San Bartolome Highschool'],
        ['year' => '2019-2020', 'degree' => 'Senior High School', 'institution' => 'Metro Manila College Inc.'],
        ['year' => '2021-Present', 'degree' => 'College', 'institution' => 'Pangasinan State University']
    ];
    $experience = [
        ['title' => 'System Administrator', 'period' => '2024-2025', 'company' => 'Sierra Manila Merchandise OPC', 'responsibilities' => ['Maintaining System', 'Updating System', 'Enhancing Systems Core']]
    ];
    $skills = ["Video Editing", "Game Development", "Bug Tester"];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }} - Biodata</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            display: flex;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .left-section {
            width: 35%;
            background-color: #f8f8f8;
            padding: 30px 20px;
        }

        .right-section {
            width: 65%;
            padding: 30px;
        }

        .header-blue {
            background-color: #1e5a96;
            color: white;
            padding: 20px;
            margin: -30px -20px 20px -20px;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            background-color: #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .name {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .title {
            font-size: 14px;
            opacity: 0.9;
        }

        .contact-info {
            margin-top: 20px;
        }

        .contact-item {
            margin-bottom: 15px;
            font-size: 11px;
        }

        .contact-label {
            font-weight: bold;
            display: block;
            margin-bottom: 3px;
        }

        .contact-value {
            color: #555;
            word-wrap: break-word;
        }

        .section-title {
            color: #1e5a96;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #1e5a96;
        }

        .objective {
            font-size: 13px;
            line-height: 1.6;
            color: #333;
            margin-bottom: 25px;
        }

        .education-item {
            margin-bottom: 20px;
        }

        .year {
            color: #666;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .degree {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 3px;
        }

        .institution {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }

        .details {
            font-size: 12px;
            color: #555;
            margin-left: 15px;
        }

        .details li {
            margin-bottom: 3px;
        }

        .experience-item {
            margin-bottom: 20px;
        }

        .job-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .job-title {
            font-weight: bold;
            font-size: 14px;
        }

        .company {
            font-size: 12px;
            color: #666;
            margin-bottom: 8px;
        }

        .responsibilities {
            font-size: 12px;
            color: #555;
            margin-left: 15px;
        }

        .responsibilities li {
            margin-bottom: 5px;
        }

        .skills-list {
            list-style: none;
        }

        .skills-list li {
            font-size: 13px;
            color: #555;
            margin-bottom: 8px;
            padding-left: 15px;
            position: relative;
        }

        .skills-list li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #1e5a96;
        }

        .age-display {
            font-style: italic;
            color: #666;
            font-size: 11px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="profile-photo">
                @if($photo)
                    <img src="{{ asset($photo) }}" alt="{{ $name }}">
                @endif
            </div>

            <div class="contact-info">
                <div class="contact-item">
                    <span class="contact-label">Phone:</span>
                    <span class="contact-value">{{ $phone }}</span>
                </div>

                <div class="contact-item">
                    <span class="contact-label">Email:</span>
                    <span class="contact-value">{{ $email }}</span>
                </div>

                <div class="contact-item">
                    <span class="contact-label">LinkedIn:</span>
                    <span class="contact-value">{{ $linkedin }}</span>
                </div>

                <div class="contact-item">
                    <span class="contact-label">GitHub:</span>
                    <span class="contact-value">{{ $github }}</span>
                </div>

                <div class="contact-item">
                    <span class="contact-label">Address:</span>
                    <span class="contact-value">{{ $address }}</span>
                </div>

                <div class="contact-item">
                    <span class="contact-label">Date of Birth:</span>
                    <span class="contact-value">{{ $dob }}</span>
                </div>

                <div class="contact-item">
                    <span class="contact-label">Gender:</span>
                    <span class="contact-value">{{ $gender }}</span>
                </div>

                <div class="contact-item">
                    <span class="contact-label">Nationality:</span>
                    <span class="contact-value">{{ $nationality }}</span>
                    @if($age == 21)
                        <span class="age-display">({{ $age }} taong gulang)</span>
                    @elseif($age == 22 || $age == 23)
                        <span class="age-display">({{ $age }} tawen ti panagbiagko)</span>
                    @elseif($age >= 24)
                        <span class="age-display">({{ $age }} taon ak la edad)</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="right-section">
            <div class="header-blue">
                <div class="name">{{ $name }}</div>
                <div class="title">{{ $profession }}</div>
            </div>

            <div class="section-title">Objective</div>
            <div class="objective">{{ $objective }}</div>

            <div class="section-title">Education</div>
            @foreach($education as $edu)
                <div class="education-item">
                    <div class="year">{{ $edu['year'] }}</div>
                    <div class="degree">{{ $edu['degree'] }}</div>
                    <div class="institution">{{ $edu['institution'] }}</div>
                    @if(isset($edu['details']))
                        <ul class="details">
                            @foreach($edu['details'] as $detail)
                                <li>{{ $detail }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach

            <div class="section-title">Experience</div>
            @foreach($experience as $exp)
                <div class="experience-item">
                    <div class="job-header">
                        <span class="job-title">{{ $exp['title'] }}</span>
                        <span class="year">{{ $exp['period'] }}</span>
                    </div>
                    <div class="company">{{ $exp['company'] }}</div>
                    @if(isset($exp['responsibilities']))
                        <ul class="responsibilities">
                            @foreach($exp['responsibilities'] as $responsibility)
                                <li>{{ $responsibility }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach

            <div class="section-title">Skills</div>
            <ul class="skills-list">
                @foreach($skills as $skill)
                    <li>{{ $skill }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>