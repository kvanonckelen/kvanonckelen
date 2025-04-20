<!-- resources/views/components/contact-form.blade.php -->

<section id="contact" class="bg-[#1a1b2f] text-white py-20">
    <div class="max-w-3xl mx-auto px-4" >
      <h2 class="text-3xl md:text-4xl font-bold text-center mb-10 text-cyan-400" data-aos="fade-up">Let's Build Something Together</h2>
  
      <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6 bg-[#23253a] p-8 rounded-2xl shadow-xl" data-aos="fade-up" data-aos-delay="100">
        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded-lg mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        @csrf
  
        <!-- Name -->
        <div data-aos="fade-right" data-aos-delay="200">
          <label for="name" class="block text-sm font-semibold mb-2">Your Name</label>
          <input type="text" id="name" name="name" required
                 class="w-full bg-[#1a1b2f] text-white border border-cyan-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" />
        </div>
  
        <!-- Email -->
        <div data-aos="fade-left" data-aos-delay="300">
          <label for="email" class="block text-sm font-semibold mb-2">Your Email</label>
          <input type="email" id="email" name="email" required
                 class="w-full bg-[#1a1b2f] text-white border border-cyan-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" />
        </div>
  
        <!-- Project Type -->
        <div data-aos="fade-right" data-aos-delay="400">
          <label for="type" class="block text-sm font-semibold mb-2">What do you need?</label>
          <select id="type" name="type" required
                  class="w-full bg-[#1a1b2f] text-white border border-cyan-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
            <option value="">Select...</option>
            <option value="Website">Website</option>
            <option value="Web App">Web App</option>
            <option value="Custom Software">Custom Software</option>
            <option value="Other">Other</option>
          </select>
        </div>
  
        <!-- Message -->
        <div data-aos="fade-left" data-aos-delay="500">
          <label for="message" class="block text-sm font-semibold mb-2">Your Message</label>
          <textarea id="message" name="message" rows="5" required
                    class="w-full bg-[#1a1b2f] text-white border border-cyan-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"></textarea>
        </div>
  
        <!-- Submit Button -->
        <div class="text-center" data-aos="zoom-in" data-aos-delay="600">
          <button type="submit"
                  class="bg-cyan-400 hover:bg-cyan-500 text-[#1a1b2f] font-bold py-3 px-8 rounded-xl transition duration-300">
            Send Message
          </button>
        </div>
      </form>
    </div>
  </section>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

  