<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ticket Validator</title>
  <link rel="shortcut icon" href="{{url('images/train.png')}}" type="image/x-icon">
  @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="min-h-screen bg-[#05445E] text-white flex items-center justify-center px-4 py-10 font-sans">

  <div class="w-full max-w-4xl space-y-8">
    <div class="flex space-x-4 p-4 bg-yellow-300 rounded-lg shadow-md w-fit justify-center gap-3">
      <label class="flex items-center space-x-2 cursor-pointer text-gray-700 text-lg">
        <input type="radio" name="action" value="info" class="accent-blue-600">
        <span>Information</span>
      </label>

      <label class="flex items-center space-x-2 cursor-pointer text-gray-700 text-lg">
        <input type="radio" name="action" value="checkin" checked class="accent-green-600">
        <span>Check-In</span>
      </label>

      <label class="flex items-center space-x-2 cursor-pointer text-gray-700 text-lg">
        <input type="radio" name="action" value="checkout" class="accent-red-600">
        <span>Check-Out</span>
      </label>
    </div>

    <div class="bg-white bg-opacity-10 backdrop-blur-md p-6 md:p-8 rounded-xl shadow-lg">
      <h2 class="text-3xl font-bold text-center mb-4">🎫 Ticket Validator</h2>
      <div class="flex flex-col items-center gap-3">
        <label for="token" class="text-white font-semibold">Scan The Bar Code Card</label>
        <input type="text" id="token" maxlength="36" placeholder="36-character token"
          class="w-full md:w-2/3 px-4 py-2 rounded-md border border-white text-black focus:outline-none focus:ring-2 focus:ring-white" />
        <p id="error-message" class="text-red-300 mt-2 hidden text-sm"></p>
      </div>
    </div>

    <!-- Result Card -->
<div id="passenger-card"
  class="hidden bg-white bg-opacity-10 backdrop-blur-md p-6 md:p-8 rounded-xl shadow-xl flex flex-col md:flex-row items-center gap-8">
  
  <div id="journey-status"
    class="absolute top-0 left-0 right-0 text-white text-center text-sm md:text-base font-semibold py-2 rounded-t-xl shadow-md z-10">
  </div>

  <img id="passenger-photo" src="" alt="Passenger"
    class="w-36 h-36 rounded-full object-cover border-4 border-white shadow-md" />

  <div class="flex-1 space-y-2 text-white text-lg">
    <h3 id="full-name" class="text-2xl font-bold mt-6"></h3>
    <p><span class="font-semibold text-gray-200">Passenger ID:</span> <span id="passenger-id"></span></p>
    <p><span class="font-semibold text-gray-200">Status:</span> <span id="passenger-status"
        class="text-black inline-block px-2 py-1 text-sm rounded-md font-bold"></span></p>
    <p><span class="font-semibold text-gray-200">Sector:</span> <span id="sector"></span></p>
    <p><span class="font-semibold text-gray-200">Home Station:</span> <span id="home-station"></span></p>
    <p><span class="font-semibold text-gray-200">Work Station:</span> <span id="work-station"></span></p>
    <p><span class="font-semibold text-gray-200">Journey Validity:</span> <span id="validity"></span></p>

    <hr class="border-white/30 my-2">
    <p><span class="font-semibold text-gray-200">Ticket Class:</span> <span id="ticket-class"
        class="text-yellow-300 font-bold"></span></p>
    <p><span class="font-semibold text-gray-200">Expire Date:</span> <span id="expire-date"
        class="text-red-400"></span></p>

    <div class="mt-6 text-center">
  <a id="view-passenger-btn" href="#"
     class="inline-block bg-gray-500 text-white font-semibold px-4 py-2 rounded shadow">
    View Passenger
  </a>
</div>

    <hr class="border-white/30 my-4">

    <!-- Latest Journey Details -->
    <h4 class="text-xl font-bold text-white mt-6 mb-2">Latest Journey</h4>
<table class="table-auto w-full text-white text-sm md:text-base">
  <thead>
    <tr class="text-gray-300">
      <th class="px-4 py-2 text-left">Journey ID</th>
      <th class="px-4 py-2 text-left">Check-In</th>
      <th class="px-4 py-2 text-left">Check-Out</th>
      <th class="px-4 py-2 text-left">Check-In</th>
      <th class="px-4 py-2 text-left">Check-Out</th>
    </tr>
  </thead>
  <tbody>
    <tr class="bg-white bg-opacity-10">
      <td class="px-4 py-2"><span id="journey_id"></span></td>
      <td class="px-4 py-2"><span id="checked_in_station"></span></td>
      <td class="px-4 py-2"><span id="checked_out_station"></span></td>
      <td class="px-4 py-2"><span id="checked_in_time"></span></td>
      <td class="px-4 py-2"><span id="checked_out_time"></span></td>
    </tr>
  </tbody>
</table>
    </div>
</div>

  </div>


  <script>
    const tokenInput = document.getElementById('token');
    const errorBox = document.getElementById('error-message');
    const card = document.getElementById('passenger-card');

    tokenInput.addEventListener('input', function () {
      const token = this.value.trim();

      // Get selected radio value safely
      const actionInput = document.querySelector('input[name="action"]:checked');
      const action = actionInput ? actionInput.value : null;

      // Proceed only if both token and action are valid
      if (token.length === 36 && action) {
        fetch('{{ route("fetch.passenger", ["station_id" => session("stationID")]) }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({ token, action })
        })
          .then(response => response.json())
          .then(data => {
            if (data.error) {
              errorBox.textContent = data.error;
              errorBox.classList.remove('hidden');
              card.classList.add('hidden');
            } else {
              errorBox.classList.add('hidden');
              const p = data.passenger;
              const j = data.latest_journey;

              document.getElementById('journey-status').textContent = data.status;
              document.getElementById('full-name').textContent = p.full_name;
              document.getElementById('passenger-id').textContent = p.id;
              document.getElementById('view-passenger-btn').href = '{{ url("/admin/passengers/")}}/' + p.id;

              const statusEl = document.getElementById('passenger-status');
              statusEl.textContent = p.status;
              statusEl.className = 'text-black inline-block px-2 py-1 text-sm rounded-md font-bold'; // reset classes

              switch (p.status.toLowerCase()) {
                case 'active':
                  statusEl.classList.add('bg-green-500');
                  break;
                case 'expired':
                  statusEl.classList.add('bg-yellow-400');
                  break;
                case 'suspended':
                  statusEl.classList.add('bg-red-500');
                  break;
                default:
                  statusEl.classList.add('bg-gray-500');
              }

              document.getElementById('sector').textContent = p.sector;
              document.getElementById('home-station').textContent = p.home_station;
              document.getElementById('work-station').textContent = p.work_station;
              document.getElementById('ticket-class').textContent = p.class;
              document.getElementById('expire-date').textContent = p.expire_date;
              document.getElementById('passenger-photo').src = p.photo;
              document.getElementById('validity').textContent = p.validity;
              

              document.getElementById('journey_id').textContent = j.id ?? "NA";
              document.getElementById('checked_in_station').textContent = j.checked_in_station  ?? "NA";
              document.getElementById('checked_out_station').textContent = j.checked_out_station  ?? "NA";
              document.getElementById('checked_in_time').textContent = j.checked_in_time  ?? "NA";
              document.getElementById('checked_out_time').textContent = j.checked_out_time  ?? "NA";


              // Clear token input
              tokenInput.value = "";

              card.classList.remove('hidden');
            }
          })
          .catch(error => {
            console.error('Fetch error:', error);
            errorBox.textContent = 'Something went wrong!';
            errorBox.classList.remove('hidden');
            card.classList.add('hidden');
          });
      } else {
        // Hide card and error message if input is invalid
        card.classList.add('hidden');
        errorBox.classList.add('hidden');
      }
    });
  </script>
</body>

</html>