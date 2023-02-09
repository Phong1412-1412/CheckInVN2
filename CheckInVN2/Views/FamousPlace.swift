//
//  ProvinceRow.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import SwiftUI

struct FamousPlace: View {
    @StateObject var FamousModel = ViewModel()
        var body: some View {
            NavigationView {
                List {
                    ForEach(FamousModel.coorFamous, id:\.id)
                    {
                        famous in
                        NavigationLink(
                            destination: FamousPlaceDetail(),
                            label: {
                                HStack {
                                    famous.imageName
                                        .resizable()
                                        .frame(width: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/, height: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/)
                                    Text(famous.name)
                      
                                }
                            })
                    }
                    
                }
                .navigationTitle("Địa Danh")
                .onAppear{
                    FamousModel.fetchFamous()
                }
            }
    }
}

struct FamousPlace_Previews: PreviewProvider {
    static var previews: some View {
        FamousPlace()
    }
}
