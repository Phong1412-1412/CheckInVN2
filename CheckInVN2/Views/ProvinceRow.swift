//
//  ProvinceRow.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import SwiftUI

struct ProvinceRow: View {
    @StateObject var viewProvince = UserViewModel()
    
    var body: some View {
        NavigationView{
            List{
                ForEach(viewProvince.provinces, id: \.self) {
                    province in
                    HStack {
                        province.imageA
                            .resizable()
                            .frame(width: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/, height: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/, alignment: .center)
                        Text(province.provinceName)
                    }
                }
            }
            .navigationTitle("Province")
            .onAppear {
                viewProvince.fetchProvince()
            }
        }
    }
}

struct ProvinceRow_Previews: PreviewProvider {
    static var previews: some View {
        ProvinceRow()
    }
}
