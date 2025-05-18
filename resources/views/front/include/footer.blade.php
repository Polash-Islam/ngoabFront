<!--<div class="footer_section">-->
<!--    <div class="container">-->
<!--        <div class="d-flex justify-content-center footer_menu">-->
<!--            <a href="">About Us</a>-->
<!--            <a href="">Contact</a>-->
<!--            <a href="">Feedback</a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <p class="footer_last">© NGO Online Registration Portal, v1.0.0</p>-->
<!--</div>-->


<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container py-4">
        <div class="copyright">
            @if(session()->get('locale') == 'en' ||  empty(session()->get('locale')))
            &copy; <strong><span>এনজিও অনলাইন নিবন্ধন পোর্টাল, v১.0.0</span></strong>. সর্বস্বত্ব সংরক্ষিত.
            @else
            &copy; <strong><span>NGO Online Registration Portal, v1.0.0</span></strong>. All Rights Reserved.
            @endif
        </div>
    </div>
</footer><!-- End Footer -->
