@component('mail::message')
    # Welcome to Foundation University Clearance Portal!

    Dear {{ $user_name }},

    We are excited to welcome you to Foundation University. You have successfully registered for the student clearance portal. Below are your credentials and some important information to get you started:

    - **Department:** {{ $student_dept }}
    - **Level:** {{ $student_level }}
    - **Matriculation Number:** {{ $matric_number }}

    To access your portal, please use your matriculation number and surname as your login credentials. The portal will provide you with all necessary tools and resources to manage your clearance process efficiently.

    @component('mail::button', ['url' => 'https://foundationuniversity.edu/portal'])
        Access Portal
    @endcomponent

    If you have any questions or need further assistance, feel free to contact our support team at support@foundationuniversity.edu.

    We wish you all the best in your academic journey with us.

    Warm regards,

    **Foundation University Administration**

@endcomponent
