//
//  ProvinceView.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import SwiftUI

struct ProvinceView: View {
    @StateObject var provinceModel = ViewModel()
    var body: some View {
        NavigationView{
            List{
                ForEach(provinceModel.provinces, id: \.self) {
                    province in
                    HStack {
                        Text(province.provinceName)
                    }
                }
            }
            .navigationTitle("Province")
            .onAppear {
                provinceModel.fetchProvince()
            }
        }
    }
}

struct ProvinceView_Previews: PreviewProvider {
    static var previews: some View {
        ProvinceView()
    }
}
