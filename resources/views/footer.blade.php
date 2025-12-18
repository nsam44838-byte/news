
<style>
    .footer {
    background: #000;
    color: #9ca3af;
    padding: 80px 0 40px;
    font-family: system-ui, sans-serif;
}

.footer-container {
    max-width: 1200px;
    margin: auto;
    padding: 0 40px;
    display: grid;
    grid-template-columns: 420px 1fr;
    gap: 120px;
}

/* LEFT */
.footer-left .logo {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 40px;
    color: #fff;
    font-size: 20px;
    font-weight: 600;
}

.logo-box {
    width: 22px;
    height: 22px;
    border: 2px solid #fff;
    transform: rotate(45deg);
}

.address {
    line-height: 1.7;
    margin-bottom: 40px;
    font-size: 14px;
}

/* PHONE + EMAIL GRID */
.contact {
    display: grid;
    grid-template-columns: 120px auto;
    row-gap: 12px;
    font-size: 14px;
}

.contact .label {
    color: #6b7280;
}

.contact .value {
    color: #fff;
}

/* RIGHT COLUMNS */
.footer-links {
    display: grid;
    grid-template-columns: repeat(3, 160px);
    column-gap: 80px;
}

.footer-links h4 {
    color: #fff;
    font-size: 15px;
    margin-bottom: 20px;
}

.footer-links a {
    display: block;
    font-size: 14px;
    margin-bottom: 12px;
    color: #9ca3af;
    text-decoration: none;
}

.footer-links a:hover {
    color: #fff;
}

/* MOBILE */
@media (max-width: 900px) {
    .footer-container {
        grid-template-columns: 1fr;
        gap: 60px;
    }

    .footer-links {
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
    }
}

</style>





<footer class="footer">
    <div class="footer-container">

        <!-- LEFT -->
        <div class="footer-left">
            <div class="logo">
                <div class="logo-box"></div>
                <span>MyWebsite</span>
            </div>

            <div class="address">
                20619 Torrence Chapel Rd<br>
                Suite 116 #1040<br>
                Cornelius, NC 28031<br>
                United States
            </div>

            <div class="contact">
                <div class="label">Phone number</div>
                <div class="value">1-800-201-1019</div>

                <div class="label">Email</div>
                <div class="value">support@mywebsite.com</div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="footer-links">

            <div>
                <h4>Quick links</h4>
                <a>Pricing</a>
                <a>Resources</a>
                <a>About us</a>
                <a>FAQ</a>
                <a>Contact us</a>
            </div>

            <div>
                <h4>Social</h4>
                <a>Facebook</a>
                <a>Instagram</a>
                <a>LinkedIn</a>
                <a>Twitter</a>
                <a>YouTube</a>
            </div>

            <div>
                <h4>Legal</h4>
                <a>Terms of service</a>
                <a>Privacy policy</a>
                <a>Cookie policy</a>
            </div>

        </div>
    </div>
</footer>
