</div>
<!-- gtranslate -->
<script language="javascript" type="text/javascript">
    function lanfTrans(lan) {
        switch (lan) {
            case 'en':
                document.getElementById('dlang').value = 'en';
                document.langForm.submit();
                break;
            case 'zh-CN':
                document.getElementById('dlang').value = 'zh-CN';
                document.langForm.submit();
                break;
            case 'id':
                document.getElementById('dlang').value = 'id';
                document.langForm.submit();
                break;
        }
    }
</script>
<!-- end -->
<!-- floating -->
<script src="<?php echo site_url('assets/floating/dist/mfb.js'); ?>"></script>
<!-- end -->
<!-- intl-phone-code -->
<script src="<?php echo site_url('assets/intl-tel-input-master/build/js/intlTelInput.js'); ?>"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        allowDropdown: true,
        // autoHideDialCode: false,
        autoPlaceholder: true,
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
        // hiddenInput: "full_number",
        // initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        preferredCountries: ['cn', 'jp'],
        // separateDialCode: true,
        utilsScript: "<?php echo site_url('assets/intl-tel-input-master/build/js/utils.js'); ?>",
    });
</script>

<!-- end -->
<script src="<?php echo base_url('assets/fe-inasea/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/fe-inasea/js/jquery.singlePageNav.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/fe-inasea/js/parallax.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/fe-inasea/slick/slick.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/fe-inasea/js/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/fe-inasea/js/templatemo-scripts.js'); ?>"></script>
</body>

</html>