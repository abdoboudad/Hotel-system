@extends('admin.layouts.layout')
@section('content')
<style>
    h1, h2 {
    color: #333;
    }
    p {
    line-height: 1.6;
    margin: 10px
    }
    a {
    color: #007BFF;
    }
</style>



  <div class="container">
    <div class="card my-3 p-4">
        <div class="text-center">
            <img  src="{{ asset('img/blacklogo.png') }}" alt="">
        </div>
        @if (session()->get('locale') == 'en')
        <div>
            <h1>About Me</h1>
            <p>Hello! My name is Abderahman Boudad, and I am a passionate web developer with a background in online education and real-world experience. I have a year of formal education and have spent 4 months working with the fantastic team at Webitech.</p>
        
            <h2>Education and Background</h2>
            <p>I embarked on my web development journey through online platforms, including Udemy and various learning resources. My educational foundation, combined with practical experience, has equipped me with the skills needed to create dynamic and engaging web applications.</p>
        
            <h2>Experience</h2>
            <p>During my tenure at Webiteck, I had the privilege of working on diverse web projects that honed my development skills. I contributed to building and maintaining websites, utilizing technologies such as JavaScript, jQuery, CSS, HTML, Bootstrap, and PHP Laravel.</p>
        
            <h2>Project Overview</h2>
            <p>This hotel management system project is a testament to my dedication and enthusiasm for web development. It showcases my proficiency in utilizing Laravel, PHP, JavaScript, jQuery, and Bootstrap to create an intuitive and efficient system to manage hotel operations.</p>
        
            <h2>Technologies Used</h2>
            <ul>
              <li><strong>Laravel:</strong> A powerful PHP framework that enabled rapid and efficient development.</li>
              <li><strong>JavaScript and jQuery:</strong> Used for dynamic and interactive components.</li>
              <li><strong>HTML and CSS:</strong> The building blocks of the project's structure and styling.</li>
              <li><strong>Bootstrap:</strong> Employed for a responsive and visually appealing design.</li>
            </ul>
        
            <h2>Design and User Experience</h2>
            <p>I emphasized a user-centric approach, striving to create an interface that's intuitive and pleasing. By integrating design principles and focusing on user experience, I aimed to ensure a seamless interaction for all users.</p>
        
            <h2>Challenges and Solutions</h2>
            <p>During development, I encountered challenges that tested my problem-solving skills. Through perseverance and research, I successfully addressed each obstacle, enriching my problem-solving abilities.</p>
        
            <h2>Future Improvements</h2>
            <p>In the future, I plan to enhance this project by implementing additional features such as integrated payment gateways, and enhanced reporting capabilities. I'm always eager to evolve and improve my creations.</p>
        
            <h2>Project Repository and Blog</h2>
            <p>For more details about this project, you can explore <a href="link-to-github-repository">the GitHub repository</a> and read about the development process on <a href="link-to-blog-post">my blog</a>.</p>
        
            <h2>Contact Information</h2>
            <p>If you have any inquiries or would like to get in touch, feel free to reach out via email at <a href="mailto:electronicabdo5@gmail.com">electronicabdo5@gmail.com</a>.</p>
        
            <h2>YouTube Channel</h2>
            <p>You can also follow my journey and learn more about web development on <a href="https://youtube.com/@codecove5">my YouTube channel</a>.</p>
        
            <p>Thank you for taking the time to learn about my project and explore my portfolio!</p>
                
            </div>
          </div>
        </div>
        @else
        <div class="container">
            <h1>حولي</h1>
            <p>مرحبًا! اسمي  عبد الرحمان ، وأنا مطور ويب متحمس لدي خلفية في التعلم عبر الإنترنت وخبرة عمل فعلية. لدي سنة من التعليم الرسمي وقضيت 4 أشهر في العمل مع فريق رائع في شركة Webitech.</p>
        
            <h2>التعليم والخلفية</h2>
            <p>بدأت رحلتي في تطوير الويب من خلال منصات التعلم عبر الإنترنت، بما في ذلك Udemy ومصادر تعلم متنوعة. بنيت خبرة تعليمية قوية ، مما جعلني مستعدًا بشكل جيد بالمهارات اللازمة لإنشاء تطبيقات ويب ديناميكية وجذابة.</p>
        
            <h2>الخبرة</h2>
            <p>خلال فترة عملي في Webiteck، كان لي شرف العمل على مشاريع ويب متنوعة ساعدت في تنمية مهاراتي في التطوير. ساهمت في بناء وصيانة مواقع الويب، باستخدام تقنيات مثل JavaScript و jQuery و CSS و HTML و Bootstrap و PHP Laravel.</p>
        
            <h2>نظرة عامة على المشروع</h2>
            <p>يُعد هذا المشروع لنظام إدارة الفنادق دليلاً على تفانيي وحماسي نحو تطوير الويب. يُظهر كفاءتي في استخدام Laravel وPHP وJavaScript و jQuery و Bootstrap لإنشاء نظام فعال وبديهي لإدارة عمليات الفندق.</p>
        
            <h2>التقنيات المستخدمة</h2>
            <ul>
              <li><strong>Laravel:</strong> إطار عمل PHP قوي سمح بتطوير سريع وفعال.</li>
              <li><strong>JavaScript و jQuery:</strong> استخدمت لإضافة عناصر ديناميكية وتفاعلية.</li>
              <li><strong>HTML و CSS:</strong> هي الأساس لهيكل المشروع وتنسيقه.</li>
              <li><strong>Bootstrap:</strong> تم استخدامه لتصميم جذاب ومتجاوب.</li>
            </ul>
        
            <h2>التصميم وتجربة المستخدم</h2>
            <p>ركزت على نهج محوري حول المستخدم، سعياً لإنشاء واجهة سهلة الاستخدام وجذابة. من خلال دمج مبادئ التصميم والتركيز على تجربة المستخدم، سعيت لضمان تفاعل سلس لجميع المستخدمين.</p>
        
            <h2>التحديات والحلول</h2>
            <p>خلال عملية التطوير، واجهت تحديات أختبرت مهاراتي في حل المشكلات. من خلال الإصرار والبحث، تمكنت من التعامل مع كل عقبة بنجاح، مما زاد من قدراتي في حل المشكلات.</p>
        
            <h2>تحسينات مستقبلية</h2>
            <p>في المستقبل، أعتزم تحسين هذا المشروع من خلال تنفيذ ميزات إضافية مثل بوابات الدفع المتكاملة، وزيادة قدرات التقارير. أنا دائما حريص على تطوير وتحسين إبداعاتي.</p>
        
            <h2>مستودع المشروع والمدونة</h2>
            <p>للمزيد من التفاصيل حول هذا المشروع، يمكنك استكشاف <a href="رابط-مستودع-GitHub">مستودع GitHub</a> وقراءة حول عملية التطوير على <a href="رابط-المدونة">مدونتي</a>.</p>
        
            <h2>معلومات الاتصال</h2>
            <p>إذا كان لديك أي استفسارات أو ترغب في التواصل، لا تتردد في مراسلتي عبر البريد الإلكتروني على <a href="mailto:electronicabdo5@gmail.com">electronicabdo5@gmail.com</a>.</p>
        
            <h2>قناتي على يوتيوب</h2>
            <p>يمكنك أيضًا متابعة رحلتي ومعرفة المزيد عن تطوير الويب على <a href="https://youtube.com/@codecove5">قناتي على يوتيوب</a>.</p>
        
            <p>شكرًا لك على الوقت الذي قضيته في معرفة مشروعي واستكشاف محفظتي!</p>
          </div>
        @endif


@endsection