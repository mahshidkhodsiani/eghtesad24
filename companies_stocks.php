<!-- <div class="table-responsive">
    <table class="table header-border table-hover verticle-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Popularity</th>
                <th scope="col">Sales</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>Air Conditioner</td>
                <td>
                    <div class="progress" style="background: rgba(127, 99, 244, .1)">
                        <div class="progress-bar" style="width: 70%;" role="progressbar"><span class="sr-only">70%
                                Complete</span>
                        </div>
                    </div>
                </td>
                <td><span class="badge badge-primary light">70%</span>
                </td>
            </tr>
            <tr>
                <th>2</th>
                <td>Textiles</td>
                <td>
                    <div class="progress" style="background: rgba(76, 175, 80, .1)">
                        <div class="progress-bar bg-success" style="width: 70%;" role="progressbar"><span
                                class="sr-only">70% Complete</span>
                        </div>
                    </div>
                </td>
                <td><span class="badge badge-success">70%</span>
                </td>
            </tr>
            <tr>
                <th>3</th>
                <td>Milk Powder</td>
                <td>
                    <div class="progress" style="background: rgba(70, 74, 83, .1)">
                        <div class="progress-bar bg-dark" style="width: 70%;" role="progressbar"><span
                                class="sr-only">70% Complete</span>
                        </div>
                    </div>
                </td>
                <td><span class="badge badge-dark light">70%</span>
                </td>
            </tr>
            <tr>
                <th>4</th>
                <td>Vehicles</td>
                <td>
                    <div class="progress" style="background: rgba(255, 87, 34, .1)">
                        <div class="progress-bar bg-danger" style="width: 70%;" role="progressbar"><span
                                class="sr-only">70% Complete</span>
                        </div>
                    </div>
                </td>
                <td><span class="badge badge-danger">70%</span>
                </td>
            </tr>
            <tr>
                <th>5</th>
                <td>Boats</td>
                <td>
                    <div class="progress" style="background: rgba(255, 193, 7, .1)">
                        <div class="progress-bar bg-warning" style="width: 70%;" role="progressbar"><span
                                class="sr-only">70% Complete</span>
                        </div>
                    </div>
                </td>
                <td><span class="badge badge-warning">70%</span>
                </td>
            </tr>
        </tbody>
    </table>
</div> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Data Table</title>
    <!-- Add any necessary CSS styles here -->
    <style>
    /* Your styles go here */
    </style>
</head>

<body>
    <div class="table-responsive">
        <table class="table header-border table-hover verticle-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company</th>
                    <th scope="col">Market Cap</th>
                    <th scope="col">Stock Price</th>
                    <th scope="col">Change</th>

                    <th scope="col">Volume</th>
                    <!-- <th scope="col">test1</th>
                    <th scope="col">test2</th>
                    <th scope="col">test3</th>

                    <th scope="col">test4</th>
                    <th scope="col">test5</th> -->
                    <th scope="col">Sector</th>
                    <!-- <th scope="col">test6</th> -->

                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody id="stockTableBody">
                <!-- Table body will be dynamically populated -->
            </tbody>
        </table>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Your JSON data
        var jsonData = [
            [
                ["AAPL\nApple Inc.\nD", "2.994T USD", "192.53 USD", "\u22120.54%", "42.671M", "0.79",
                    "31.41", "6.13 USD", "+0.45%", "0.49%", "Electronic Technology", "Buy"
                ],
                ["MSFT\nMicrosoft Corporation\nD", "2.795T USD", "376.04 USD", "+0.20%", "18.731M", "0.70",
                    "36.42", "10.33 USD", "+11.28%", "0.74%", "Technology Services", "Strong buy"
                ],
                ["GOOG\nAlphabet Inc.\nD", "1.755T USD", "140.93 USD", "\u22120.25%", "14.881M", "0.61",
                    "27.02", "5.22 USD", "+3.56%", "0.00%", "Technology Services", "Strong buy"
                ],
                ["AMZN\nAmazon.com, Inc.\nD", "1.57T USD", "151.94 USD", "\u22120.94%", "39.822M", "0.84",
                    "79.33", "1.92 USD", "+75.87%", "0.00%", "Retail Trade", "Strong buy"
                ],
                ["NVDA\nNVIDIA Corporation\nD", "1.223T USD", "495.22 USD", "0.00%", "38.929M", "1.14",
                    "65.39", "7.57 USD", "+222.20%", "0.03%", "Electronic Technology", "Strong buy"
                ],
                ["META\nMeta Platforms, Inc.\nD", "909.629B USD", "353.96 USD", "\u22121.22%", "14.987M",
                    "0.90", "31.24", "11.33 USD", "+7.92%", "0.00%", "Technology Services", "Strong buy"
                ],
                ["TSLA\nTesla, Inc.\nD", "789.898B USD", "248.48 USD", "\u22121.86%", "100.887M", "0.87",
                    "80.01", "3.11 USD", "\u22124.05%", "0.00%", "Consumer Durables", "Neutral"
                ],
                ["BRK.A\nBerkshire Hathaway Inc.\nD", "776.892B USD", "542625.03 USD", "\u22120.44%",
                    "8.111K", "0.96", "10.29", "52740.00 USD", "\u2014", "0.00%", "Finance", "Buy"
                ]
            ]
        ];

        // Function to populate the table
        function populateTable(data) {
            var tableBody = document.getElementById("stockTableBody");

            // Clear existing rows
            tableBody.innerHTML = "";

            // Iterate through the JSON data and create rows
            data.forEach(function(row, index) {
                var newRow = tableBody.insertRow();
                newRow.insertCell(0).textContent = index + 1; // Index column

                // Loop through the columns and add data
                for (var i = 0; i < row.length; i++) {

                    if (i == 5 || i == 6 || i == 7 || i == 8 || i == 9 || i == 11 ) {
                        // do nothing
                    } else {
                        newRow.insertCell(i + 1).textContent = row[i];
                    }

                }
            });
        }

        // Call the function to populate the table
        populateTable(jsonData);
    });
    </script>
</body>

</html>