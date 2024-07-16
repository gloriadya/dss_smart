<x-guest-layout>
    <form method="POST" action="{{ route('kandidat.store') }}">
        @csrf
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Submit Form</button>
    </form>
</x-guest-layout>