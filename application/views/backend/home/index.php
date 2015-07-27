

<script type="text/javascript">

    $(function() {

        var data = [ ["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9] ];

        $.plot("#placeholder", [ data ], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.6,
                    align: "center"
                }
            },
            xaxis: {
                mode: "categories",
                tickLength: 0
            }
        });

        // Add the Flot version string to the footer

        $("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
    });

</script>

<div class="col-lg-6">
    <div id="header">
        <h2>Categories</h2>
    </div>

    <div id="content">

        <div class="demo-container">
            <div id="placeholder" class="demo-placeholder"></div>
            <span>a</span> <span>a</span> <span>a</span> <span>a</span> <span>a</span>
        </div>
    </div>

    <div id="footer">
        Copyright &copy; 2007 - 2014 IOLA and Ole Laursen
    </div>
</div>


