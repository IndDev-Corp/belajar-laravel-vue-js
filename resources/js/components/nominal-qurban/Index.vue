<template>
    <div>
        <h2>Ini data nominal qurban</h2>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Nominal</th>
                    <th>Nominal Qurban</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <template v-for="nominalQurban in nominalQurbans">
                    <tr :key="nominalQurban.id">
                        <td>{{ nominalQurban.id }}</td>
                        <td>{{ nominalQurban.nama_nominal }}</td>
                        <td>{{ nominalQurban.nominal_qurban }}</td>
                        <td v-html="nominalQurban.status"></td>
                        <td>
                            <a class="text-primary" href="#">Ubah</a>
                            <a class="text-danger" href="#">Hapus</a>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data: function() {
        return {
            nominalQurbans: [
                {
                    id: 1,
                    nama_nominal: "Paket A",
                    nominal_qurban: "Rp10.000",
                    status: '<span class="badge badge-danger">Gagal</span>'
                },
                {
                    id: 2,
                    nama_nominal: "Paket B",
                    nominal_qurban: "Rp20.000",
                    status: '<span class="badge badge-warning">Menunggu</span>'
                },
                {
                    id: 3,
                    nama_nominal: "Paket C",
                    nominal_qurban: "Rp30.000",
                    status: '<span class="badge badge-success">Sukses</span>'
                }
            ]
        };
    }
};
</script>
<style scoped>
h2 {
    color: red;
}
</style>