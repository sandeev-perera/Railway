<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ticket Validator</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#05445E] text-white flex items-center justify-center px-4 py-10 font-sans">

  <div class="w-full max-w-4xl space-y-8">

    <!-- Input Section -->
    <div class="bg-white bg-opacity-10 backdrop-blur-md p-6 md:p-8 rounded-xl shadow-lg">
      <h2 class="text-3xl font-bold text-center mb-4">🎫 Ticket Validator</h2>
      <div class="flex flex-col items-center gap-3">
        <label for="token" class="text-white font-semibold">Scan The Bar Code Card</label>
        <input type="text" id="token" maxlength="36"
               placeholder="36-character token"
               class="w-full md:w-2/3 px-4 py-2 rounded-md border border-white text-black focus:outline-none focus:ring-2 focus:ring-white" />
        <p id="error-message" class="text-red-300 mt-2 hidden text-sm"></p>
      </div>
    </div>

    <!-- Result Card -->
    <div id="passenger-card" class="hidden bg-white bg-opacity-10 backdrop-blur-md p-6 md:p-8 rounded-xl shadow-xl flex flex-col md:flex-row items-center gap-8">
      <img id="passenger-photo" src="" alt="Passenger"
           class="w-36 h-36 rounded-full object-cover border-4 border-white shadow-md" />

      <div class="flex-1 space-y-2 text-white text-lg">
        <h3 id="full-name" class="text-2xl font-bold"></h3>
        <p><span class="font-semibold text-gray-200">Passenger ID:</span> <span id="passenger-id"></span></p>
        <p><span class="font-semibold text-gray-200">Status:</span> <span id="passenger-status" class="text-black inline-block px-2 py-1 text-sm rounded-md font-bold"></span></p>
        <p><span class="font-semibold text-gray-200">Sector:</span> <span id="sector"></span></p>
        <p><span class="font-semibold text-gray-200">Home Station:</span> <span id="home-station"></span></p>
        <p><span class="font-semibold text-gray-200">Work Station:</span> <span id="work-station"></span></p>
        <p><span class="font-semibold text-gray-200">Journey Validity:</span> <span id="validity"></span></p>

        <hr class="border-white/30 my-2">
        <p><span class="font-semibold text-gray-200">Ticket Class:</span> <span id="ticket-class" class="text-yellow-300 font-bold"></span></p>
        <p><span class="font-semibold text-gray-200">Expire Date:</span> <span id="expire-date" class="text-red-400"></span></p>
      </div>
    </div>
  </div>

  <script>
    const tokenInput = document.getElementById('token');
    const errorBox = document.getElementById('error-message');
    const card = document.getElementById('passenger-card');

    tokenInput.addEventListener('input', function () {
      const token = this.value.trim();

      if (token.length === 36) {
        fetch('{{ route("fetch.passenger", ["station_id" =>session('stationID')]) }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({ token: token })
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
document.getElementById('full-name').textContent = p.full_name;
document.getElementById('passenger-id').textContent = p.id;

const statusEl = document.getElementById('passenger-status');
statusEl.textContent = p.status;
statusEl.classList.remove('bg-green-500', 'bg-yellow-400', 'bg-red-500');

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
        card.classList.add('hidden');
        errorBox.classList.add('hidden');
      }
    });
  </script>

</body>
</html>
